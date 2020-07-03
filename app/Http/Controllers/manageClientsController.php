<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Request as Req;

class manageClientsController extends Controller
{
    //
    public function index($key=null) 
    {
	//
        $all_clients = Client::all(['id','name','comapny']);
        if (!is_null($key)) {
            $clients = $key ;
        }else{
            $clients = Client::orderBy('created_at' , 'asc')->paginate(5);
        }
    	
        return view('admin.clients.index')->with('clients',$clients)->with('all_clients',$all_clients) ;    

    }

    public function search(Request $request){

        if (isset($request->name) && isset($request->comapny)) {
            $client= Client::where('name','like', '%'.$request->name.'%')->orWhere('comapny','like', '%'.$request->comapny.'%')->paginate(10);  
        }elseif (!isset($request->name) && isset($request->comapny)) {
            $client= Client::where('comapny','like', '%'.$request->comapny.'%')->paginate(10);  
        }elseif (isset($request->name) && !isset($request->comapny)) {
            $client= Client::where('name','like', '%'.$request->name.'%')->paginate(10);  
        }else{
           return $this->index(); 
        } 
        return $this->index($client);
    }

    public function show($id){

        $client = Client::find($id);

        $reqs = Req::where('client_id', '=' , $id)->get()  ;
        $openReqs = Req::where('client_id', '=' , $id)->where('status', '=' , 'open')  ;
        $notReqs = Req::where('client_id', '=' , $id)->where('status', '=' , 'not_yet') ;
        $closedReqs = Req::where('client_id', '=' ,$id)->where('status', '=' , 'cloesd')  ;

        return view('admin.clients.show')->with('client',$client)->with('reqs',$reqs)
        ->with('openReqs',$openReqs)->with('notReqs',$notReqs)->with('closedReqs',$closedReqs) ;
    }

    public function closed(){
        $requests = Req::where('status', '=' , 'cloesd');
        return view('admin.requests.closed-requests')->with('requests',$requests);
    } 

    public function suspense($id){
        $client = Client::find($id);
        if ($client->suspense) {
           $client->suspense = false; 
           if ($client->save()) {
           return redirect()->route('manage.clients')->with('client_activated', $client->name);  
        } 
        }else{
          $client->suspense = true; 
              if ($client->save()) {
               return redirect()->route('manage.clients')->with('client', $client->name);  
            } 
        }
                
        
        
    }

    public function delete($id){
        $client = Client::find($id);
        if ($client->delete()) {
           return redirect()->route('manage.clients')->with('del_client', $client->name);   
        }

    }


   

}
