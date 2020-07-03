<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Request as Req;
use Auth;
use App\Client;
class ClientController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth:client');
    }

    public function index()
    {
        $requests = Req::where('client_id', '=', Auth::user()->id)->where('status','!=','closed')->orderBy('created_at','desc')->paginate(5) ;
        return view('clients.dashboard')->with('requests',$requests);
    }

    public function show($id){
        $client = Client::find($id);
        $reqs = Req::where('client_id', '=' , $id)->get()  ;
        $openReqs = Req::where('client_id', '=' , Auth::user()->id)->where('status', 'like' , '%'. 'open' .'%' )  ;
        $notReqs = Req::where('client_id', '=' , Auth::user()->id)->where('status', 'like' , '%'. 'not_yet'.'%' ) ;
        $closedReqs = Req::where('client_id', '=' , Auth::user()->id)->where('status', 'like' , '%'. 'closed'.'%' ) ;
        $cancelReqs = Req::where('client_id', '=' , Auth::user()->id)->where('status', 'like' , '%'. 'canceled'.'%' ) ;
        $feedbackReqs = Req::where('client_id', '=' , Auth::user()->id)->where('status', 'like' , '%'. 'feedback'.'%' ) ;

        return view('clients.show')->with('client',$client)->with('reqs',$reqs)
        ->with('openReqs',$openReqs)->with('notReqs',$notReqs)->with('closedReqs',$closedReqs)->with('cancelReqs',$cancelReqs)
        ->with('feedbackReqs',$feedbackReqs) ;
    }

    public function edit($id){
        $client = Client::find($id);
        return view('clients.edit')->with('client',$client) ;
    }

    public function update(Request $request,$id){
        // dd($request);
        $client = Client::find($id);
        $client->name =$request->input('name');
        $client->comapny =$request->input('company');
        $client->email =$request->input('email');
        $client->phone =$request->input('phone');
        if($request->input('password')) $client->password = Hash::make($request->input('password'));
        if($client->save()) return redirect()->route('client.show',$client->id) ;   
    }

     public function editReq($id){
        $req = Req::find($id);
        return view('clients.edit-req')->with('req',$req);
    }




}
