<?php

namespace App\Http\Controllers\Admin\Role;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('back.roles.users.index', compact('users'));
    }

    public function show(User $user)
    {
        $roles = Role::all();
        $permissions = Permission::all();

        return view('back.roles.users.role', compact('user', 'roles', 'permissions'));
    }

    public function destroy(User $user)
    {
        if ($user->hasRole('Super Admin')){
            $notification = array(
                'message' => __('You are super admin.'),
                'alert-type' => 'info',
                'type' => 'toast',
            );
            return back()->with($notification);
        }
        $user->delete();

        $notification = array(
                'message' => __('User deleted.'),
                'alert-type' => 'info',
                'type' => 'toast',
        );
        return back()->with($notification);
    }

    public function assignRole(Request $request, User $user)
    {
        if ($user->hasRole($request->role)){
            $notification = array(
                'message' => __('Role exists.'),
                'alert-type' => 'info',
                'type' => 'toast',
            );
            return back()->with($notification);
        }
        $user->assignRole($request->role);

        $notification = array(
                'message' => __('Role assigned.'),
                'alert-type' => 'info',
                'type' => 'toast',
        );
        return back()->with($notification);
    }

    public function removeRole(User $user, Role $role)
    {
        if ($user->hasRole($role)){
            $user->removeRole($role);

            $notification = array(
                'message' => __('Role removed.'),
                'alert-type' => 'info',
                'type' => 'toast',
            );
            return back()->with($notification);
        }

        $notification = array(
                'message' => __('Role not exists.'),
                'alert-type' => 'info',
                'type' => 'toast',
        );
        return back()->with($notification);
    }

    public function givePermission(Request $request, User $user)
    {
        if ($user->hasPermissionTo($request->permission)) {
            $notification = array(
                'message' => __('Permission exists.'),
                'alert-type' => 'info',
                'type' => 'toast',
            );
            return back()->with($notification);

        }
        $user->givePermissionTo($request->permission);

        $notification = array(
                'message' => __('Permission added.'),
                'alert-type' => 'info',
                'type' => 'toast',
        );
        return back()->with($notification);
    }

    public function revokePermission(User $user, Permission $permission)
    {
        if ($user->hasPermissionTo($permission)){
            $user->revokePermissionTo($permission);
            $notification = array(
                'message' => __('Permission revoked.'),
                'alert-type' => 'info',
                'type' => 'toast',
            );
            return back()->with($notification);
        }

        $notification = array(
                'message' => __('Permission does not exists.'),
                'alert-type' => 'info',
                'type' => 'toast',
        );
        return back()->with($notification);
    }
}
