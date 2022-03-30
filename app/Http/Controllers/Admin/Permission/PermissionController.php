<?php

namespace App\Http\Controllers\Admin\Permission;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('permission:create permission')->only('create', 'store');
        $this->middleware('permission:edit permission')->only('edit', 'update');
        $this->middleware('permission:show permssion')->only('show', 'index');
        $this->middleware('permission:delete permission')->only('delete');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::all();
        return view('back.permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate(['name' => 'required|unique:Spatie\Permission\Models\Permission,name']);
        Permission::create($validated);

        $notification = array(
            'message' => __('Permission created.'),
            'alert-type' => 'success',
            'type' => 'toast',
        );
        return redirect()->route('permissions.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \Spatie\Permission\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Spatie\Permission\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        $roles = Role::all();
        return view('back.permissions.edit', compact('permission', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Spatie\Permission\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        $validated = $request->validate([
            'name' => ['required']
        ]);
        $permission->update($validated);

        $notification = array(
            'message' => __('Permission updated.'),
            'alert-type' => 'success',
            'type' => 'toast',
        );
        return redirect()->route('permissions.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Spatie\Permission\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();

        $notification = array(
            'message' => __('Permission deleted.'),
            'alert-type' => 'success',
            'type' => 'toast',
        );
        return redirect()->route('permissions.index')->with($notification);
    }

    public function removeRole(Permission $permission, Role $role)
    {
        if ($permission->hasRole($role)){
            $permission->removeRole($role);
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

    public function assignRole(Request $request, Permission $permission)
    {
        $validated = $request->validate(['roles.*' => 'required']);

        if ($permission->hasRole($request->role)){
        // if ($permission->hasAllRoles($request->roles)){
            $notification = array(
                'message' => __('Role exists.'),
                'alert-type' => 'info',
                'type' => 'toast',
            );
            return back()->with($notification);
        }

        $permission->assignRole($request->role);
        // $permission->syncRoles($request->roles);

        $notification = array(
                'message' => __('Role assigned.'),
                'alert-type' => 'info',
                'type' => 'toast',
        );
        return back()->with($notification);
    }
}
