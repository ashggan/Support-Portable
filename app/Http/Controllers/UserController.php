<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Hash;
use App\Http\Resources\display;
use Auth;
use App\roleUser;
class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($key=null)
    {
        //
        if(!is_null($key)) {
            $users = $key;
        }else{
            $users  = User::orderBy('created_at','desc')->paginate(10);
        }
        $roles = Role::all(['id','display_name']);
        $all_users = User::all(['id','name']);
        return view('admin.users.index')->with('users',$users)->with('roles',$roles)->with('all_users',$all_users);
    }

    public function search(Request $request){
        // dd($request);
        if (isset($request->name) && isset($request->comapny)) {
             return $this->index();
        }elseif (!isset($request->name) && isset($request->comapny)) {
            $roles =  roleUser::where('role_id','=',$request->comapny)->get();
            $ids  = $roles->pluck('user_id') ;       
            $user = User::whereIn('id', $ids)->paginate(10);
         }elseif (isset($request->name) && !isset($request->comapny)) {
            $user =  User::where('id','=',$request->name)->paginate(10);
        }else{
             return $this->index();
        }
            return $this->index($user);

    }

    public function create()
    {
        //
        $this->middleware('auth',['permission:create-users']);
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        
        $this->validate($request,['name'=>'required|string|max:255','email'=>'required|email']);
        $user = new   User ;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        if ($user->save())  return  redirect()->route('users.show',$user->id)->with('user_msg', 'user'.$user->name.'has been created');
 
    }

    public function show($id)
    {
        //
        $user = User::find($id);
        return view('admin.users.show')->with('user',$user);

    }

    public function edit($id)
    {
        //
        $roles = Role::all();
        $user = User::find($id);
        return view('admin.users.edit')->with('user',$user)->with('roles',$roles);
    }

    public function update(Request $request, $id)
    {
        //
        $user = User::find($id);
        // dd($request);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        if(isset($request->password)) $user->password = Hash::make($request->input('password'));

        if($user->save()) {
            $user->roles()->sync($request->roles);
        } 
        return  redirect()->route('users.show',$user->id);
    }

    public function modify(){
        $user = User::find(Auth::user()->id);
        return view('admin.users.profile')->with('user',$user);
    }

    public function change(Request $request ,$id){
       // dd($request);
        $user = User::find($id);
        if($request->name) $user->name =$request->name;
        if($request->email) $user->email =$request->email;
        if($request->password) $user->password = Hash::make($request->email);

        if($user->save()) return  redirect()->route('users.show',$user->id);    
    }
    

    public function destroy($id)
    {
        $user = User::find($id);
        $name = $user->name;
        if ($user->delete($user)) {
            return redirect()->route('users.index')->with('user_msg',  $name );
        }
        
    }    
    
}
