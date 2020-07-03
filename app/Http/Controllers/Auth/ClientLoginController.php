<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Client;
class ClientLoginController extends Controller
{
    //

	public function __construct()
	{
		$this->middleware('guest');
		 
	}

    
    public function loginForm()
    {
        if (Auth::guard('web')->check()) {
            return redirect()->back();
        }
    	 return view('auth.client-login');
    }

    public function login(Request $request)
    {
    	//valiodate the data from the user
    	$this->validate($request, ['email'=>'required|email','password'=>'required']);
    	$data= ['email'=>$request->input('email'), 'password' => $request->input('password')] ;

    	// attempt the user in
        $cl = Client::where('email', 'like', '%'. $request->input('email'). '%')->first();
        // dd($cl->name);
        if ($cl->suspense) {
            return redirect()->back()->with('client_account_suspensed',$cl->name);
        }else{
            if (Auth::guard('client')->attempt($data,$request->remember)) {
                return redirect()->intended(route('client.dashboard'));
            }
            
            // if yes redirect to the intended
            return  redirect()->back();   
        }
    	
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect('/');
    }
}
