<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('users.index',compact('users'));
    }

    public function create(){
        $users = User::all();
        $roles = Role::all();
        return view('users.create',compact('users','roles'));

    }

    public function store(Request $request){

        $validated = $request->validate([
            'username' => 'required',
            'email' => 'email|required',
            'password' => 'required|min:8|confirmed',
            'roles.*' =>'exists:roles,id'
        ]);


        $validated['password'] = Hash::make($validated['password']);

       $user = User::create($validated);
        $user->roles()->attach($request->roles);


        return redirect('/user');

    }



    public function edit($id){
        $users = User::findOrFail($id);
        return view('users.update',compact('users'));

    }

    public function update(User $id){

    }
}
