@extends('layouts.client-dashboard')
@section('content')

 
<div class="container mt-5">
    @if($requests->count() == 0 )
        <div class="box">
            <p>You have no request </p>

        </div> 
    @else
    <div class="box">
        <div class="row">
            <div class="col-md-10 offset-md-1 mb-5 mt-5">
                 @foreach($requests as $request)
                    @switch($request->status)
                        @case('open')
                            <div class="open-request mt-5">
                                <div class="row ">                
                                        <div class="col-md-5 offset-md-1">
                                            <a href="{{route('request.show',$request->id)}} "> <h6>{{ $request->subjects}}  </h6></a>
                                            <p><i class="fa fa-ticket fa-lg mr-2"></i>Ticket number : <strong>{{"#".$request->ticket}} </strong>   </p>   

                                            <p><i class="fa fa-clock-o fa-lg mr-2"></i>Date created :
                                                 <strong> <span id="date">
                                                {{  date("F d, Y ", strtotime($request->updated_at) )  }}  </span></strong> 
                                                <span id="lead" style="display:none">{{$request->leadtime }}</span> </p>   
                                            <p> <i class="fa fa-flag fa-lg mr-2"></i>Prioirty : <strong> {{$request->prioirty}}</strong>     </p>   
                                            <p> <i class="fa fa-info fa-lg mr-2"></i>Status : <strong> Assigned </strong>  </p>   
                                   </div>
                                   
                                            <test :updateddate="{{  json_encode(date("F d, Y h:i A", strtotime($request->updated_at)))   }}"   
                                                   :lead="{{$request->leadtime}}" ></test>
                                </div>        
                            </div>   
                        @break
                        @case('not_yet')
                        <div class="card mb-5 mt-5">
                            <div class="card-body">
                                <a href="{{route('request.show',$request->id)}} "> <h6>  {{$request->subjects}}<span class="badge badge-primary ml-3">new</span> </h6> </a>
                                <div class="row mt-5">
                                    <div class="col-md-6">
                                       <p> <i class="fa fa-ticket fa-lg mr-2"></i>Ticket nubmer :<strong>  {{"#".$request->ticket}} </strong>  </p>  
                                    </div>
                                    <div class="col-md-6">
                                        <p> <i class="fa fa-clock-o fa-lg mr-2"></i>Date created :  <strong> {{ date("F d, Y ", strtotime($request->updated_at) )  }} </strong></p> 
                                    </div>
                                    <div class="col-md-6">
                                        <p> <i class="fa fa-flag fa-lg mr-2"></i>Prioirty : <strong>{{$request->prioirty}} </strong>   </p>
                                    </div>
                                    <div class="col-md-6">
                                       <p> <i class="fa fa-info fa-lg mr-2"></i>Status :<strong> New </strong>  </p> 
                                    </div>
                                </div>
                                {{-- <p>this request has not been assigned yet</p> --}}
                            </div>
                        </div>
                        @break
                        @case('feedback')
                        <div class="card mb-5 mt-5">
                            <div class="card-body">
                                 <a href="{{route('request.show',$request->id)}} "> <h6>  {{$request->subjects}}<span class="badge badge-success ml-3">feedback</span> </h6> </a>
                               <div class="row mt-5">
                                    <div class="col-md-6">
                                       <p> <i class="fa fa-ticket fa-lg mr-2"></i>Ticket number :<strong>  {{"#".$request->ticket}} </strong>  </p>  
                                    </div>
                                    <div class="col-md-6">
                                        <p> <i class="fa fa-clock-o fa-lg mr-2"></i>Date created :  <strong> {{ date("F d, Y ", strtotime($request->updated_at) )  }} </strong></p> 
                                    </div>
                                    <div class="col-md-6">
                                        <p> <i class="fa fa-flag fa-lg mr-2"></i>Prioirty : <strong>{{$request->prioirty}} </strong>   </p>
                                    </div>
                                    <div class="col-md-6">
                                       <p> <i class="fa fa-info fa-lg mr-2"></i>Status :<strong> Feedback </strong>  </p> 
                                    </div>
                                </div>
                                {{-- <p><i class="fa fa-lg fa-comments-o mr-2"></i>this request need feedback</p>                                         --}}
                            </div>
                        </div>
                        @break
                    @endswitch             
                @endforeach  
                <div class="row justify-content-center mt-5 mb-5">{{$requests->links() }} </div>  
            </div>
        </div>
        
    </div>
    @endif 
</div>
@endsection
 

 
 