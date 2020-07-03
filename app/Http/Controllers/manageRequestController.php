<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Request as Req;
use Auth;
use App\User;
use App\Client;
use Mail;
use App\Mail\requestSolved;
use App\roleUser;
class manageRequestController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
         
    }
    public function index($key = null) 
    {
        $clients = Client::all(['id','name','comapny']);
        $users = User::all(['id','name']);

        if (Auth::user()->hasRole('superadministrator|administrator')) {

            if (!is_null($key)) { 
                $requests = $key;
                // dd($requests);
            }
            else{
                $requests = Req::orderBy('created_at', 'desc')->paginate(10); 
            }
           
        }elseif(Auth::user()->hasRole('support')) {
           $requests = Req::where('assignee','=',Auth::user()->id)->orderBy('created_at', 'desc')->paginate(10); 
        }
    	
    	return view('admin.requests.index')->with('requests',$requests)->with('clients',$clients)->with('users',$users);
    }

    public function search(Request $request){   
        // dd($request);
        if( isset($request->client_name))  {
            $requests = Req::where('client_id','=',$request->client_name)->paginate(10);
            // dd($requests);
        }elseif (isset($request->company)) {
            $requests = Req::where('client_id','=',$request->company)->paginate(10);
            // dd($requests);
        }elseif (isset($request->assignee)) {
            $requests = Req::where('assignee','=',$request->assignee)->paginate(10);
        }elseif (isset($request->status)) {
            $requests = Req::where('status','=',$request->status)->paginate(10);
        }
        // elseif( !isset($request->client_name) && isset($request->company) && !isset($request->assignee) && !isset($request->status))  {
        //     $requests = Req::where('client_id','=',$request->comapny)->paginate(10);
        // }elseif( !isset($request->client_name) && !isset($request->company) && !isset($request->assignee) && isset($request->status))  {
        //     $requests = Req::where('client_id','like', '%'.$request->comapny.'%')->paginate(10);
        // }
        else{
            return $this->index();
        }    
        return $this->index($requests);

    }

    public function cancel($id,Request $request){
        // dd($request);
        $req = Req::find($id);
        // $reg->assignee = '';
        // $req->solution ="";
        // $req->leadtime ="";
        $req->status ="canceled";
        if ($req->save()) {
            return redirect()->route('manage.requests');
        }
    }


    public function show($id){
     	$req = Req::find($id);
    	return view('admin.requests.show')->with('req',$req);
    }

    public function edit($id){
     	$req = Req::find($id);
    	return view('admin.requests.edit')->with('req',$req);
    }

    public function solve($id){
     	$req = Req::find($id);
    	return view('admin.requests.solve')->with('req',$req);
    }

    public function solved(Request $request,$id){
     	$req = Req::find($id);
     	// dd($request);
        $this->validate($request,[
            'solution'=>'required',
            'attachment'=>'mimes:pdf,doc,docx,jpg,jpeg,png,xlsx,xls'
        ]);
     	$req->solution = $request->input('solution');
        $req->status = 'closed';
        if ($request->file('attachment')) {
            $full_file_name= $request->file('attachment')->getClientOriginalName();
            $file_name = pathinfo($full_file_name,PATHINFO_FILENAME);
            $extension = $request->file('attachment')->getClientOriginalExtension();
            $file_name_to_store = $file_name.'_'.time().'.'.$extension;
            $path = $request->file('attachment')->move('attachments', $file_name_to_store);
            $req->attachment = $file_name_to_store;
        }
     	if($req->save()){
            // Mail::to($req->client->email)->send(new requestSolved($req));
            return  redirect()->route('manage.requests.show',$req->id) ;
        }
    }

    public function assign($id){
     	$req = Req::find($id);
    	$users = User::select('id','name')->get();
    	return view('admin.requests.assign')->with('users',$users)->with('req',$req) ;
    }

    public function assigned(Request $request,$id){
     	$req = Req::find($id);
        $this->validate($request,
            [
                'assignee'=>'required',
                'prioirty'=>'required',
                'leadtime'=>'required|integer'
            ]);
        // dd($request);;
     	$req->assignee = $request->input('assignee') ;
        $req->status = 'open';
     	$req->prioirty = $request->input('prioirty');
     	$req->leadtime = $request->input('leadtime');
     	if($req->save())	return redirect()->route('manage.requests.show',$req->id) ;
    }

    public function closed(){
        if(Auth::user()->hasRole('administrator|superadministrator')){
            $requests = Req::where('status' ,'like','%'.'closed'.'%')->orderBy('created_at', 'desc')->paginate(10);  
        }elseif(Auth::user()->hasRole('support')) {
           $requests = Req::where('assignee','like',Auth::user()->id)->where('status' ,'like','%'.'closed'.'%')->orderBy('created_at', 'desc')->paginate(10);  
        }   

        return view('admin.requests.closed-requests')->with('requests',$requests);
    }

    public function delete($id){
        $req = Req::find($id);
        if ($req->delete()) {
            return redirect()->route('manage.requests')->with('del_req',$req->ticket);
        }
    }

    public function feedback($id){
        $req = Req::find($id);
        if ($req->status =="feedback") {
            $req->status = "open";
            $status = "Assigned";
        }else{
            $req->status = "feedback";
            $status = "feedback";
        }
       
        if ($req->save()) {
            return redirect()->route('manage.requests')->with('req_feedback',$status);
        }
    }

    

    



}
