<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \YaroslavMolchan\Rbac\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::all();
        return view('permissions.index_permission', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('permissions.create_permission');
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
        ],[
            "name.required" => "ce champ est obligatoire.",
            "slug.required" => "ce champ est obligatoire."
        ]);

        $permission = Permission::FirstOrCreate([
            "name" => $request->name,
            "slug" => $request->slug,
        ]);

        return redirect()->route('permission.show', $permission);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $permission = Permission::FindOrFail($id);
        return view('permissions.show_permission', compact('permission'));
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
            "slug.required" => "ce champ est obligatoire."
        ]);

        $permission = Permission::FindOrFail($id);

        $permission->update([
            "name" => $request->name,
            "slug" => $request->slug,
        ]);

        return redirect()->route('permission.show', $permission);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Permission::destroy($id);
        return redirect()->route('permission.index');
    }
}
