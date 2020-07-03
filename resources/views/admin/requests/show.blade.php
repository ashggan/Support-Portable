@extends('layouts.admin-dashboard')
@section('content')

<div class="container">
	<div class="box">
		<div class="row">
			<div class="col-md-10 offset-md-1">
				<h4>{{  $req->subjects}}  </h4>			
			</div>
			<div class="col-md-3 offset-md-1">
				<p><i class="fa fa-ticket fa-lg mr-2"></i>Ticket :  #<STRONG> {{$req->ticket}}</STRONG>  </p>
			</div>
			<div class="col-md-3">
				<p><i class="fa fa-clock-o fa-lg mr-2"></i> Date : <strong> {{date("F d, Y", strtotime($req->created_at ))}}   </strong></p>
			</div>
			<div class="col-md-3">
				{{-- @if($req->assignee) --}}
				<p><i class="fa fa-clock-o fa-lg mr-2"></i> Client : <strong> {{ $req->client->name   }}   </strong></p>
				{{-- <p>Assignee {{$req->user->name }} </p> --}}
				{{-- @endif --}}
			</div>
		</div>
		<div class="row">
			<div class="col-md-10 offset-md-1">
				{{-- <small> {{ date("F d, Y", strtotime($req->created_at )) }}</small>  --}}
				{{-- # date("F d, Y h:i A", strtotime($req->created_at )) }}# --}}
				<hr>
				<p>{!! html_entity_decode($req->detials) !!} </p>				
			</div>

			<div class="col-md-10 offset-md-1">
				@if($req->screenshots)
					<div class="col-md-10 offset-md-1">
						<p> <a href="/screenshots/{{$req->screenshots}}" target="_blank" class="btn btn-outline-dark"><i class="fa fa-lg fa-download"></i> view attachment</a> </p>
					</div>
				@endif
			</div>
		</div>

		{{--  check if the request is assigned   			@if(is_null($req->solution))  --}}	
	<div class="row  mb-5 mt-5">
		<div class="offset-md-1"></div>
		@switch($req->status)
			@case('not_yet')
			{{--  check is user is assignee and role permissions to solve the request  --}}
				@if( Auth::user()->hasRole(['superadministrator','administrator']) )
			        <div class="col-md-3   align-self-center">
			            <a class="btn btn-dark btn-block " href="{{route('manage.requests.assign',$req->id)}} "><i class="fa fa-lg fa-gear mr-3"></i> Assign </a>
			        </div>	
 		    	@endif
				{{--  check is user is assignee and role permissions to solve the request  --}}
				@break

			@case('open')
				{{--  check is user is assignee and role permissions to solve the request  --}}
				@if(Auth::user()->id == $req->assignee  && Auth::user()->hasRole('support') )
			        <div class="col-md-3   align-self-center">
			            <a class="btn btn-dark btn-block " href="{{route('manage.requests.solve',$req->id)}}"><i class="fa fa-lg fa-edit mr-3"></i> SOLVE </a>
			        </div>	
		    	@endif
				{{--  check is user is assignee and role permissions to solve the request  --}}
			@break
			@case('closed')
			        <div class="col-md-10  align-self-center mb-5">
						<h4>  request solution </h4>
						<small> {{ date("F d, Y h:i A", strtotime($req->updated_at )) }}</small> 	   
						<p>{!! html_entity_decode($req->solution) !!} </p>
						
						
						
						@if($req->attachment) 
						<a href="/attachments/{{$req->attachment}}"  target="_blank"class="btn btn-outline-dark"><i class="fa fa-lg fa-download"></i> VIEW ATTACHMENT</a>
						@endif
						  


		 	        </div>	
					
 					{{-- <div class="col-md-1"></div> --}}
					@if(Auth::user()->id == $req->assignee  && Auth::user()->hasRole('support') )
				        	
				        	<div class="col-md-3 offset-md-1   align-self-center">
				            	<a class="btn btn-dark btn-block " href="{{route('manage.requests.solve',$req->id)}} "><i class="fa fa-lg fa-gear mr-3"></i> Edit SOLUTON </a>
				        	</div>	
					@endif	
  					
		    	
			@break	
		@endswitch
		@if(Auth::user()->hasRole('support'))

			<div class="col-md-3 align-self-center">
				<form method="POST" action="{{ route('manage.requests.feedback',$req->id)}}"  >
                @csrf
                @if($req->status == "feedback")
			        <button class="btn btn-dark btn-block " type="submit"  ><i class="fa fa-lg fa-tasks mr-3"></i>Re-Assign </button>
                @else
			        <button class="btn btn-dark btn-block " type="submit"  ><i class="fa fa-lg fa-comments-o mr-3"></i>Feedback </button>
                @endif
			        <input type="hidden" name="_method" value="put" />
            	</form>
			</div>
		@endif

			<div class="col-md-3   align-self-center">
				<form method="POST" action="{{ route('manage.requests.cancel',$req->id)}}"  >
                @csrf
			        <button class="btn btn-dark btn-block " type="submit"  ><i class="fa fa-lg fa-remove mr-3"></i> Cancel</button>
			        <input type="hidden" name="_method" value="put" />
            	</form>
			</div>

		@if(Auth::user()->hasRole('superadministrator'))
		<div class="col-md-3  align-self-center">
				<form method="POST" action="{{ route('manage.requests.delete',$req->id)}}"  >
                @csrf
			        <button class="btn btn-dark btn-block " type="submit"  ><i class="fa fa-lg fa-trash mr-3"></i> Delete</button>
			        <input type="hidden" name="_method" value="delete" />
            	</form>
			</div>
		@endif
	</div>
		
	</div>
	</div>
</div>

@endsection