<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::orderBy('id','desc')->get();
        return view('admin.roles.index',['roles' => $roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'role_name'=>'required|max:250',
            'role_slug'=>'required|max:250',
        ]);
        $role= new Role();

        $role->name = $request->role_name;
        $role->slug = $request->role_slug;

        $role->save();

        $listofPermissions = explode(',',$request->roles_permission);

        foreach($listofPermissions as $permission)

        {
            $permissions = new Permission();
            $permissions->name = $permission;
            $permissions->slug = strtolower(str_replace("", ".", $permissions));
            $permissions->save();
            $role->permissions()->attach($permissions->id); 
            $role->save();
        
        }




        return redirect('/roles');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return view('admin.roles.show',['role' => $role]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        return view ('admin.roles.edit',['role' => $role]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'role_name'=>'required|max:250',
            'role_slug'=>'required|max:250',
        ]);

        $role->name = $request->role_name;
        $role->slug = $request->role_slug;
        $role->save();

        $role->permissions()->delete();
        $role->permissions()->detach();

        $listofPermissions = explode(',', $request->roles_permissions);
        foreach($listofPermissions as $permission)
        {
            $permissions=new Permission();
            $permissions->name=$permission;
            $permissions->slug= strtolower(str_replace(" ", ".",$permission));
            $permissions->save();
            $role->permissions()->attach($permissions->id);
            $role->save();
        }
        return redirect('/roles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->permissions()->delete();
        $role->delete();
        $role->permission()->detach();
        return redirect('/roles');
    }
}
