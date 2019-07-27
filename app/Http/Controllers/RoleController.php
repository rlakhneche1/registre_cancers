<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \YaroslavMolchan\Rbac\Models\Role;
use \YaroslavMolchan\Rbac\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        return view('roles.index_role', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('roles.create_role',compact('permissions'));
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
            "name" => "required",
            "slug" => "required",
            "permissions" => "required"
        ],[
            "name.required" => "ce champ est obligatoire.",
            "slug.required" => "ce champ est obligatoire.",
            "permissions.required" => "ce champ est obligatoire.",
        ]);

        $role = Role::FirstOrCreate([
            "name" => $request->name,
            "slug" => $request->slug
        ]);

        $permissions = $request->permissions;

        $role->attachPermission($permissions);

        return redirect()->route('role.show', $role);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::FindOrFail($id);
        $permissions = Permission::all();
        return view('roles.show_role', compact('role','permissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            "name" => "required",
            "slug" => "required",
        ],[
            "name.required" => "ce champ est obligatoire.",
            "slug.required" => "ce champ est obligatoire.",
        ]);

        $role = Role::FindOrFail($id);

        $role->update([
            "name" => $request->name,
            "slug" => $request->slug,
        ]);

        return redirect()->route('role.show', $role);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Role::destroy($id);
        return redirect()->route('role.index');
    }

    public function affecter_permissions(Request $request)
    {
        $request->validate([
            "permissions" => 'required',
        ],[
            "permissions.required" => 'Ce champ est obligatoire.',
        ]);

        $role = Role::FindOrFail($request->id_role);

        foreach ($request->permissions as $id_permission) {
            $id = (int) $id_permission;
            $role->attachPermission($id);
        }

        return redirect(Route('role.show',$role->id));
    }

    public function detacher_permission($id_role, $id_permission)
    {
        $role = Role::FindOrFail($id_role);
        $role->detachPermission($id_permission);
        return redirect(Route('role.show',$role->id));
    }
}
