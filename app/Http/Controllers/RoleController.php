<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{

    public function index(){
        $roles = Role::all();
        return view('roles.index',compact('roles'));
    }



    public function store(Request $request){

        $validated = $request->validate([
            "name"=> "required"
        ]);

        Role::create($validated);
        return redirect('/role');

    }



}
