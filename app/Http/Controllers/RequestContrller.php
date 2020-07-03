<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Request as Req;
use App\Mail\RequstSubmit;
use Mail;
use Auth;
use App\Http\Resources\display;
class RequestContrller extends Controller
{
    //
     public function __construct()
    {
        $this->middleware('auth:client');
    }

    public function allReuests(){
    	return true;
    }

    public function create(){
    	return view('clients.create') ;
    }

    public function all(){
        $reqs = Req::all();
        return display::collection($reqs) ;
    }

    public function list($key=null){
        if (is_null($key)) {
            $reqs = Req::where('client_id','=',Auth::user()->id)->orderBy('created_at' ,  'desc')->paginate(10);
            
        }else{
           $reqs = $key;   
        }
        return view('clients.list')->with('reqs',$reqs);
    }

    public function show($id){
     	$req = Req::find($id);
    	return view('clients.view')->with('req',$req);
    }



    public function store(Request $request){
    	// dd($request);
        $this->validate($request,[ 
            'subjects'=> 'required|max:512|string',
            'detials'=>'required' ,
            'screenshots'=>'mimes:pdf,doc,docx,jpg,jpeg,png,xlsx,xls,xlc']);
    	$latest = Req::orderBy('created_at', 'desc')->first();
     	$req = new Req;
        $req->subjects = $request->subjects;
    	$req->detials = $request->detials;
    	$req->client_id = $request->client_id;
    	$req->ticket =  ++$latest->ticket  ;
        if ($request->file('screenshots')) {
            // return "yes";
        // dd($request);

            $full_file_name= $request->file('screenshots')->getClientOriginalName();
            $file_name = pathinfo($full_file_name,PATHINFO_FILENAME);
            $extension = $request->file('screenshots')->getClientOriginalExtension();
            $file_name_to_store = $file_name.'_'.time().'.'.$extension;
            $path = $request->file('screenshots')->move('screenshots', $file_name_to_store);
            $req->screenshots = $file_name_to_store;
        }
    	if ($req->save()){
    		// Mail::to(Auth::user()->email)->send(new RequstSubmit($req));
    		return redirect()->route('request.show',$req->id);
    	   }
    }

    public function update(Request $request){
        // dd($request);
        $this->validate($request,[ 'detials'=>'required' ,'screenshots'=>'mimes:pdf,doc,docx,jpg,jpeg,png,xlsx,xls,xlc']);
        $req = Req::find($request->id);
        $req->detials = $request->detials;
        if ($request->file('screenshots')) {
            // return "yes";
        // dd($request);

            $full_file_name= $request->file('screenshots')->getClientOriginalName();
            $file_name = pathinfo($full_file_name,PATHINFO_FILENAME);
            $extension = $request->file('screenshots')->getClientOriginalExtension();
            $file_name_to_store = $file_name.'_'.time().'.'.$extension;
            $path = $request->file('screenshots')->move('screenshots', $file_name_to_store);
            $req->screenshots = $file_name_to_store;
        }
        if ($req->save()) {
            // Mail::to(Auth::user()->email)->send(new RequstSubmit($req));
            return redirect()->route('request.show',$req->id);
           }
    }

    public function search(Request $request){
        // dd($request);
        $req  = Req::where('status','like' , '%'.$request->status .'%')->where('client_id' ,'=',Auth::user()->id )->orderBy('created_at','desc')->paginate(10);
        return $this->list($req);
    }

   
}
