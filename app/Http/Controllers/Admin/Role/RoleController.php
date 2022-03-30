<?php

namespace App\Http\Controllers\Admin\Role;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('permission:create role')->only('create', 'store');
        $this->middleware('permission:edit role')->only('edit', 'update');
        $this->middleware('permission:show role')->only('show', 'index');
        $this->middleware('permission:delete role')->only('delete');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        return view('back.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate(['name' => 'required|unique:Spatie\Permission\Models\Role,name']);
        Role::create($validated);

        $notification = array(
            'message' => __('Role created.'),
            'alert-type' => 'success',
            'type' => 'toast',
        );
        return redirect()->route('roles.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  Spatie\Permission\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Spatie\Permission\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('back.roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Spatie\Permission\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $validated = $request->validate(['name' => ['required', 'min:3']]);
        $role->update($validated);

        $notification = array(
            'message' => __('Role Updated successfully.'),
            'alert-type' => 'success',
            'type' => 'toast',
        );
        return redirect()->route('roles.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Spatie\Permission\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();

        $notification = array(
            'message' => __('Role deleted.'),
            'alert-type' => 'success',
            'type' => 'toast',
        );
        return redirect()->route('roles.index')->with($notification);
    }

    public function givePermission(Request $request, Role $role)
    {
        if ($role->hasPermissionTo($request->permission)){
        // if ($role->hasAllPermissions($request->permissions)){
            $notification = array(
                'message' => __('Permission exists.'),
                'alert-type' => 'info',
                'type' => 'toast',
            );
            return back()->with($notification);
        }

        $role->givePermissionTo($request->permission);
        // $role->syncPermissions($request->permissions);

        $notification = array(
                'message' => __('Permission added.'),
                'alert-type' => 'info',
                'type' => 'toast',
            );
        return back()->with($notification);
    }

    public function revokePermission(Role $role, Permission $permission)
    {
        if ($role->hasPermissionTo($permission)){
            $role->revokePermissionTo($permission);
            $notification = array(
                'message' => __('Permission revoked.'),
                'alert-type' => 'info',
                'type' => 'toast',
            );
            return back()->with($notification);
        }

        $notification = array(
                'message' => __('Permission not exists.'),
                'alert-type' => 'info',
                'type' => 'toast',
        );
        return back()->with($notification);
    }
}
