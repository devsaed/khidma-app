<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Spatie\Permission\Models\Permission;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    
    public function showLogin(Request $request)
    {
        $cities = City::all();
        $validator = Validator(
            ['guard' => $request->guard],
            ['guard' => 'required|string|in:admin,user']
        );
        if (!$validator->fails()) {
            session()->put('guard', $request->guard);
            return response()->view('cms.auth.login',['cities' => $cities]);
        } else {
            abort(Response::HTTP_NOT_FOUND);
        }
    }


    public function login(Request $request)
    {
        $validator = Validator($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:3',
            'remember' => 'required|boolean',
        ]);

        if (!$validator->fails()) {
            $credentials = [
                'email' => $request->input('email'),
                'password' => $request->input('password'),
            ];
            if (Auth::guard(session()->get('guard'))->attempt($credentials, $request->input('remember'))) {
                return response()->json(['message' => 'Logged in successfully']);
            } else {
                return response()->json(['message' => 'Login failed, check credentials'], Response::HTTP_BAD_REQUEST);
            }
        } else {
            return response()->json(
                ['message' => $validator->getMessageBag()->first()],
                Response::HTTP_BAD_REQUEST
            );
        }
    }

    public function registerUser(Request $request){

        $validator = Validator($request->all(), [
            'user_name' => 'required|string|min:3',
            'user_email' => 'required|string',
            'user_mobile' => 'required|string|numeric|unique:users,mobile|digits:10',
            'user_city_id' => 'required|numeric|exists:cities,id',
            'user_password' => 'required|string|min:3|max:15',
        ]);

        if (!$validator->fails()) {
            $user = new User();
            $user->name = $request->get('user_name');
            $user->email = $request->get('user_email');
            $user->mobile = $request->get('user_mobile');
            $user->city_id = $request->get('user_city_id');
            $user->password = Hash::make($request->get('user_password'));
            $isSaved = $user->save();
            if($isSaved){
                $permissions = Permission::where('guard_name', '=', 'user')
                ->orWhere('guard_name', '=', 'user-api')
                ->get();
                foreach ($permissions as $permission) {
                    $user->givePermissionTo($permission);
                }
            }
            return response()->json(['message' => $isSaved ? 'Saved successfully' : 'Failed to save'], $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }
    }



    public function editPassword(Request $request)
    {
        return response()->view('cms.auth.change-password');
    }

    public function updatePassword(Request $request)
    {
        $guard = auth('admin')->check() ? 'admin' : 'user';
        $validator = Validator($request->all(), [
            'password' => 'required|current_password:' . $guard,
            'new_password' => ['required', 'confirmed', Password::min(6)],
        ]);

        if (!$validator->fails()) {
            // $user = auth($guard)->user();
            // $user = auth()->user();
            $user = $request->user();
            $user->forceFill([
                'password' => Hash::make($request->input('new_password')),
            ]);
            $isSaved = $user->save();
            return response()->json(
                ['message' => $isSaved ? 'Password changed successfully' : 'Failed to change password!'],
                $isSaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
            );
        } else {
            return response()->json(
                ['message' => $validator->getMessageBag()->first()],
                Response::HTTP_BAD_REQUEST
            );
        }
    }
    
    public function logout(Request $request)
    {
        $guard = session('guard');
        Auth::guard($guard)->logout();
        $request->session()->invalidate();
        return redirect()->route('cms.login', $guard);
    }

}
