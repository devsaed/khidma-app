<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Symfony\Component\HttpFoundation\Response;

class AdminController extends Controller
{


    public function __construct()
    {
        // $this->authorizeResource(Admin::class, 'admin');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Admin::where('id', '!=', auth('admin')->id())->get(); 
        return response()->view('cms.admins.index', ['admins' => $admins]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::where('guard_name', 'admin')->get();
        return response()->view('cms.admins.create', ['roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator($request->all(), [
            'name' => 'required|string|min:3',
            'email' => 'required|string|email|unique:admins,email',
            'mobile' => 'required|string|numeric|unique:admins,mobile|digits:10',
            'active' => 'required|boolean',
        ]);

        if (!$validator->fails()) {
            $admin = new Admin();
            $admin->name = $request->get('name');
            $admin->email = $request->get('email');
            $admin->mobile = $request->get('mobile');
            $admin->password = Hash::make(12345);
            $admin->active = $request->get('active');
            $isSaved = $admin->save();
            if ($isSaved) $admin->syncRoles(Role::findOrFail($request->get('role_id')));
            return response()->json(['message' => $isSaved ? 'Saved successfully' : 'Failed to save'], $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        $roles = Role::where('guard_name', 'admin')->get();
        return response()->view('cms.admins.edit', ['admin' => $admin, 'roles' => $roles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        $validator = Validator($request->all(), [
            'name' => 'required|string|min:3',
            'email' => 'required|string|email|unique:admins,email,' . $admin->id,
            'mobile' => 'required|string|numeric||digits:10|unique:admins,mobile,' . $admin->id,
            'active' => 'required|boolean',
        ]);

        if (!$validator->fails()) {
            $admin->name = $request->get('name');
            $admin->email = $request->get('email');
            $admin->mobile = $request->get('mobile');
            $admin->active = $request->get('active');
            $isSaved = $admin->save();
            if ($isSaved) $admin->syncRoles(Role::findOrFail($request->get('role_id')));
            return response()->json(['message' => $isSaved ? 'Saved successfully' : 'Failed to save'], $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        $isDeleted = $admin->delete();
        return response()->json(['message' => 'Deleted successfully'], $isDeleted ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
    }
}
