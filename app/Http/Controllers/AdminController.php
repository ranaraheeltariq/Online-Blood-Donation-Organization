<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Spatie\Permission\Models\Permission;
use \Spatie\Permission\Models\Role;
use \Illuminate\Support\Collection;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.index');
    }

    /**
     * View for Create Roles.
     *
     * @return \view\admin\role
     */
    public function role()
    {
        $roles = Role::all();
        $permissions = Permission::all();
        return view('admin.role',compact('roles','permissions'));
    }

    /**
     * View for Create Roles.
     *
     * @return \Package\spatie
     */
    public function storerole(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'guard' => 'required|string',
         ]);

         $role = Role::create([
             'guard_name' => $request->guard,
              'name' => $request->name
              ]);

        $role->syncPermissions($request->permission);

        $status = 'Your Information Entered Successfully';
        return response()->json($status);
    }

     /**
     * View for Show Role.
     *
     * @return \view\admin\role
     */
    public function roleshow(Role $role)
    {
        $data = ([
            'role' => $role,
            "permissions" => $role->permissions,
        ]);
        return response()->json($data);
    }

    /**
     * View for Update Role.
     *
     * @return \view\admin\role
     */
    public function roleupdate(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|string',
            'guard' => 'required|string',
         ]);
        
        foreach($role->permissions as $permission)
        {  
         $role->revokePermissionTo($permission);
        }

         $role->update([
             'guard_name' => $request->guard,
              'name' => $request->name
              ]);
        $role->syncPermissions($request->permission);
        $status = 'Your Information Updated Successfully';
         return response()->json($status);
    }

    /**
     * View for Update Role.
     *
     * @return \view\admin\role
     */
    public function roledestroy(Role $role)
    {
        foreach($role->permissions as $permission)
        {  
         $role->revokePermissionTo($permission);
        }
        $role->delete();
        $status = 'Your Information Deleted Successfully';
        return response()->json($status);

    }

    /**
     * View for Create Permission.
     *
     * @return \view\admin\permission
     */
    public function permission()
    {
        $permissions = Permission::all();
        return view('admin.permission',compact('permissions'));
    }

    /**
     * View for Create Permission.
     *
     * @return \view\admin\permission
     */
    public function storepermission(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'guard' => 'required|string',
         ]);

         $permission = Permission::create([
             'guard_name' => $request->guard,
              'name' => $request->name
              ]);

        $status = 'Your Information Entered Successfully';
        return response()->json($status);
    }

     /**
     * View for Show Role.
     *
     * @return \view\admin\role
     */
    public function permissionshow(Permission $permission)
    {
        $data =  $permission;
        return response()->json($data);
    }

    /**
     * View for Update Permission.
     *
     * @return \view\admin\permission
     */
    public function permissionupdate(Request $request, Permission $permission)
    {
        $request->validate([
            'name' => 'required|string',
            'guard' => 'required|string',
         ]);

         $permission->update([
             'guard_name' => $request->guard,
              'name' => $request->name
              ]);

        $status = 'Your Information Updated Successfully';
         return response()->json($status);
    }
    
    /**
     * View for Update Permission.
     *
     * @return \view\admin\permission
     */
    public function permissiondelete(Permission $permission)
    {
        $permission->delete();
        $status = 'Your Information Deleted Successfully';
        return response()->json($status);
    }

}
