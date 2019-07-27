<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \YaroslavMolchan\Rbac\Models\Role;
use App\Employe;
use App\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users.index_user', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employes = Employe::all();
        $roles = Role::all();
        return view('users.create_user', compact('employes','roles'));
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
            "employe" => 'required',
            "username" => 'required',
            "mail" => 'required',
            "password" => 'required',
            "roles" => 'required',
        ],[
            "employe.required" => 'Ce champ est obligatoire.',
            "username.required" => 'Ce champ est obligatoire.',
            "mail.required" => 'Ce champ est obligatoire.',
            "password.required" => 'Ce champ est obligatoire.',
            "roles.required" => 'Ce champ est obligatoire.',
        ]);

        event(new Registered($user = User::FirstOrCreate([
            'name' => $request->username,
            'email' => $request->mail,
            'password' => Hash::make($request->password),
            'employe_id' => $request->employe,
        ])));

        foreach ($request->roles as $id_role) {
            $id = (int) $id_role;
            $user->attachRole($id);
        }
        return redirect(Route('user.show',$user->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::FindOrFail($id);
        $roles = Role::all();
        return view('users.show_user', compact('user','roles'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function affecter_role(Request $request)
    {
        $user = User::FindOrFail($request->id_user);
        foreach ($request->roles as $id_role) {
            $id = (int) $id_role;
            $user->attachRole($id);
        }
        return redirect(Route('user.show',$user->id));
    }

    public function detache_role($id_user,$id_role)
    {
        $user = User::FindOrFail($id_user);
        $user->detachRole($id_role);
        return redirect()->route('user.show', $user->id);
    }
}
