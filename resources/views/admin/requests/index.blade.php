@extends('layouts.admin-dashboard')
@section('style')
<link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
@endsection
@section('content')

<div class="container">
	<div class="box">
		@include('inc.notes')
		<div class="row mt-5 mb-5">
			<div class="col-md-7 offset-md-1"><h4>Requests</h4></div>
		</div>
		<form action="{{route('manage.requests.search')}}" method="POST" >
			{{ csrf_field() }}
			<div class="row mt-5 mb-5">
				<div class="col-md-3 offset-md-1">
					<div class="form-group">
					<label>Client name</label>
					<select class="form-control single-select" name="client_name">
						<option value="">Select</option>
						@foreach($clients as $client)
					  	<option value="{{$client->id}} ">{{$client->name}}</option>
						@endforeach
	 				</select>	
					</div>
								
				</div>
				<div class="col-md-3">
					<div class="form-group">
					<label>Client company</label>
					<select class="form-control single-select" name="company">
						<option value="">Select</option>
						@foreach($clients as $client)
					  	<option value="{{$client->id}} ">{{$client->comapny}}</option>
						@endforeach
	 				</select>
	 				</div>			
				</div>
				@role('superadministrator|administrator')
				<div class="col-md-3">
					<div class="form-group">
					<label>Assignee</label>
					<select class="form-control single-select" name="assignee">
						<option value="">Select</option>
						@foreach($users as $user)
                            @if($user->hasRole('support'))
					  			<option value="{{$user->id}} ">{{$user->name}}</option>
					  		@endif
						@endforeach
	 				</select>
	 				</div>			
				</div>
				<div class="col-md-3 offset-md-1">
					<div class="form-group">
					<label>Status</label>
					<select class="form-control single-select" name="status">
						<option value="">Select</option>
 					  	<option value="not_yet"> new</option>
 					  	<option value="open"> assigned</option>
 					  	<option value="feedback"> feedback</option>
 					  	<option value="closed"> Closed</option>
 					  	<option value="canceled"> canceled</option>
 	 				</select>
 	 				</div>			
				</div>
				@endrole
				<div class="col-md-3">
					<div class="form-group">
						<label></label>
						<button type="submit" class="btn btn-dark btn-block" style="padding-top: 8px"><i class="fa fa-search fa-lg mr-2"></i> Search</button>			
					</div>
				</div>

			</div>
		</form>
		@if($requests->count() == 0 )
		<div class="row">
 			<div class="col-md-10 offset-md-1">
				<p>there is   no   requests</p>
			</div>
		</div>
		
		@else
		

		<div class="row">
			<div class="col-md-10 offset-md-1">
				<table class="table table-hover">
				  <thead>
				    <tr>
				      <th scope="col">TICKET</th>
		  		      <th scope="col">STATUS</th>
		  		      <th scope="col">CLIENT NAME</th>
		  		      <th scope="col">comapny</th>
		  		      <th scope="col">..</th>
				    </tr>
				  </thead>
				  <tbody>
				  	@foreach($requests as $request)
				    <tr @if($request->status=="closed") class="table-success" 
				    	@elseif($request->status=="not_yet") class="table-light" 
				    	@elseif($request->status=="feedback") class="table-info" 
				    	@elseif($request->status=="canceled") class="table-danger" 
				    	@elseif($request->status=="open") class="table-warning" 
				    	@endif>
				      <td><a href="{{route('manage.requests.show',$request->id)}}" >#{{$request->ticket}}</a> </td>
				      <td>  
						@if($request->status=="closed") CLOSED
				    	@elseif($request->status=="not_yet") NEW 
				    	@elseif($request->status=="feedback") FEEDBACK
				    	@elseif($request->status=="canceled") CANCELLED
				    	@elseif($request->status=="open") ASSIGNED
				    	@endif
				      </td>
				      <td><a href="{{route('manage.clients.show',$client->id)}}" >{{$request->client->name}}</a></td>
				      <td><a href="#" >{{$request->client->comapny}}</a></td>
				      @role(['superadministrator','administrator'])
					      @if(is_null($request->assignee))
			  		      <td> <a href="{{route('manage.requests.assign',$request->id)}} "><i class="fa fa-edit fa-lg"></i> ASSIGN</a> </td>
			  		      @else
			  		      <td> <a href="{{route('manage.requests.assign',$request->id)}} "><i class="fa fa-edit fa-lg"></i> RE-ASSIGN</a> </td>			 
			  		      @endif
		  		      @endrole
		  		      @role('support')
		  		      <td> <a href="{{route('manage.requests.solve',$request->id)}} "><i class="fa fa-edit fa-lg"></i> Solve</a> </td>	  	
		  		      @endrole
				    </tr>
				    @endforeach
			 	  </tbody>
				</table>
			</div>
		</div>  
				

		<div class="row justify-content-center mt-5 mb-5">{{$requests->links() }}</div>	
		@endif
	</div>
	 		
	
</div>

@endsection

@section('script')
<script src="{{ asset('js/select2.min.js') }}" type="text/javascript"></script>
<script>
    $('.single-select').select2();
</script>
@endsection