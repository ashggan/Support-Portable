<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Client;
use Hash;
use Auth;
class ClientRegisteration extends Controller
{
    //
    public function __construct()
    {
         //Do your magic here
        $this->middleware('auth');
    }
    public function create(){
        return view('admin.clients.create');
    }
    public function register(Request $request)
    {
    	// dd($request); 
    	$client = new Client;
    	$this->validate($request,[
    		'name'=> 'required|string',
    		'email' => 'required|email',
    		'company'=> 'required|string',
            'phone'=> 'required',
    		'description'=> 'required',
    		'password' => 'required'
    	]);

    	$client->name = $request->input('name');
    	$client->comapny  = $request->input('company');
    	$client->phone = $request->input('phone');
        $client->email = $request->input('email');
    	$client->description = $request->input('description');
    	$client->password = Hash::make($request->input('password'));
    	  	
        if ($client->save()) {
            return redirect()->route('manage.clients.show',$client->id);
        }
    	// $data= ['email'=>$request->input('email'), 'password' => $request->input('password')] ;
    	// if (Auth::guard('client')->attempt($data,$request->remember)) {
    	// 	return redirect()->intended(route('client.dashboard'));
    	// }

    }

    public function edit($id){
        $client = Client::find($id);
        return view('admin.clients.edit')->with('client',$client); 
    }

    public function update(Request $request ,$id){
        // dd($request);
        // $this->validate($request,[
        //     'name'=> 'required|string',
        //     'email' => 'required|email',
        //     'comapny'=> 'required|string',
        //     'phone'=> 'required',
        //     'description'=> 'required',
        //     'password' => 'required'
        // ]);

        $client = Client::find($id);

        if($request->input('name'))  $client->name = $request->input('name');
        if($request->input('company'))  $client->comapny = $request->input('company');
        if($request->input('phone'))  $client->phone = $request->input('phone');
        if($request->input('email'))  $client->email = $request->input('email');
        if($request->input('description'))  $client->description = $request->input('description');
        if($request->input('password'))  $client->password = Hash::make($request->input('password'));

        if ($client->save()) {
            return redirect()->route('manage.clients.show',$client->id);
        }
        
     }
}
