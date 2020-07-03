@extends('layouts.client-dashboard')
@section('content')

<div class="container">
	<div class="box mb-5">
		<div class="row">
			<div class="col-md-10 offset-md-1">
 				<h4>{{$req->subjects}}</h4>
 			</div>	
			<div class="col-md-3 offset-md-1 mb-5">
                <p><i class="fa fa-ticket fa-lg mr-2"></i>Ticket number : <strong>{{"#".$req->ticket}} </strong>   </p>   

			</div>
			<div class="col-md-3">
				<p><i class="fa fa-clock-o fa-lg mr-2"></i>Date  :
                 <strong> <span id="date">
                {{  date("F d, Y ", strtotime($req->updated_at) )  }}  </span></strong> 
                <span id="lead" style="display:none">{{$req->leadtime }}</span> </p>
			</div>
			<div class="col-md-3">
                <p> <i class="fa fa-flag fa-lg mr-2"></i>Prioirty : <strong> {{$req->prioirty}}</strong>     </p>   	
			</div>
			<div class="col-md-10 offset-md-1">
				<p class="mb-5 mb-5">{!! html_entity_decode($req->detials) !!} </p>
 			</div>	
 				
			

			@if($req->screenshots)
			<div class="col-md-10 offset-md-1">
				<p> <a href="/screenshots/{{$req->screenshots}}" target="_blank" class="btn btn-outline-dark"><i class="fa fa-lg fa-download"></i> view attachment</a> </p>
			</div>
			@endif

		</div>
		<div class="row">
			@if(in_array($req->status, ['not_yet','feedback','cancel','closed']) )
			<div class="col-md-10 offset-md-1">
				<a href="{{route('client.edit-req',$req->id)}}" class="btn btn-dark btn-block mt-5 mb-5"><i class="fa fa-edit fa-lg"></i> Edit</a>
			</div>
			@endif
		</div>
	</div>
</div>
@endsection 