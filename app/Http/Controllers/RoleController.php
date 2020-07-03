<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\Permission;

class RoleController extends Controller
{

    public function __construct()
    {

        $this->middleware('auth');
    }

    public function index()
    {
        //
        $roles = Role::all();
        return view('role.index')->with('roles',$roles);
    }

    public function create()
    {
        //
        $pers  = Permission::all();
        return view('role.create')->with('pers',$pers);
    }

    public function store(Request $request)
    {
        // dd($request);
        $role = new Role;
        $role->display_name = $request->input('display_name');
        $role->name = strtolower($request->input('display_name')) ;
        $role->description = $request->input('description');
        if($role->save()) {
            $role->permissions()->sync($request->pers);
        } 
        return redirect()->route('role.show',$role->id);
        
    }

    public function show($id)
    {
        //
        $role = Role::find($id);
        return view('role.show')->with('role',$role);
    }

    public function edit($id)
    {
        //
        $pers  = Permission::all();
        $role = Role::find($id);
        return view('role.edit')->with('role',$role)->with('pers',$pers);
    }

    public function update(Request $request, $id)
    {
        //
        // dd($request);
        $role = Role::find($id);
        $role->display_name = $request->input('display_name');
        $role->name = strtolower($request->input('display_name')) ;
        $role->description = $request->input('description');
        if($role->save()) {
            $role->permissions()->sync($request->pers);
        } 
        return redirect()->route('role.show',$role->id);

        //response()->json(['success' => 'You have   deleted an image'], 200);

    }

 
    public function destroy($id)
    {
        //
    }
}
