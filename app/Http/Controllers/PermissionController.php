<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permission;
class PermissionController extends Controller
{
    //
    public function __construct()
    {
    	$this->middleware('auth');
    }
    public function index()
    {
    	$pers  = Permission::paginate(10);
    	return view('permission.index')->with('pers',$pers);
    }

    public function stroe(Request $request){

    }

    public function show($id){
    	$per = Permission::find($id);
    	return view('permission.show')->with('per',$per);
    }

    public function edit($id){
    	$per = Permission::find($id);
    	return view('permission.edit')->with('per',$per);
    }


    public function update(Request $request,$id){
    	
    	$per = Permission::find($id);
    	$per->display_name = $request->input('display_name');
    	$per->description = $request->input('description');
    	// $per->name = strtolower(str_replace(' ', '-',$request->input('display_name')));

    	if($per->save()) return redirect()->route('permission.show',$per->id);
    }
}
