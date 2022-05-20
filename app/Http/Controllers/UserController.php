<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('city')->withCount('permissions')->get();
        return response()->view('cms.user.index', ['users' => $users]);
    }


    public function editUserPermissions(Request $request, User $user)
    {
        $permissions = Permission::where('guard_name', '=', 'user')
            ->orWhere('guard_name', '=', 'user-api')
            ->get();
        $userPermissions = $user->permissions;
        foreach ($permissions as $permission) {
            $permission->setAttribute('assigned', false);
            foreach ($userPermissions as $userPermission) {
                if ($permission->id == $userPermission->id) {
                    $permission->setAttribute('assigned', true);
                }
            }
        }

        return response()->view('cms.user.user-permissions', ['permissions' => $permissions, 'user' => $user]);
    }

    public function updateUserPermissions(Request $request, User $user)
    {
        $validator = Validator($request->all(), [
            'permission_id' => 'required|numeric|exists:permissions,id',
        ]);
        if (!$validator->fails()) {
            //SELECT * FROM permissions where guard_name = 'user' AND id = 1;
            // $permission = Permission::findById($request->input('permission_id'), 'user');
            $permission = Permission::findOrFail($request->input('permission_id'));
            if ($user->hasPermissionTo($permission)) {
                $user->revokePermissionTo($permission);
            } else {
                $user->givePermissionTo($permission);
            }
            return response()->json(['message' => 'Permission updated successfully'], Response::HTTP_OK);
        } else {
            return response()->json(
                ['message' => $validator->getMessageBag()->first()],
                Response::HTTP_BAD_REQUEST
            );
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
            //
        $isDeleted = $user->delete();
        return response()->json(['message' =>  $isDeleted ? 'Deleted successfully' : 'Delete failed'], $isDeleted ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
    }
}
