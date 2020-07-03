@extends('layouts.admin-dashboard')
@section('style')
<link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
@endsection
@section('content')

<div class="container">
	<div class="box">
		<div class="row mt-5 mb-5">
			<div class="col-md-7 offset-md-1"><h4>closed Requests</h4></div>
		</div>
		@if($requests->count() == 0 )
		<div class="row">
			<div class="col-md-10 offset-md-1">
				<p>you have no assigned requests</p>
			</div>
		</div>
		
		@else
		{{-- <form action="{{route('manage.requests.search')}}" method="POST" >
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
				@role('superadministrator')
				<div class="col-md-3">
					<div class="form-group">
					<label>Assignee</label>
					<select class="form-control single-select" name="assignee">
						<option value="">Select</option>
						@foreach($users as $user)
					  	<option value="{{$user->id}} ">{{$user->name}}</option>
						@endforeach
	 				</select>
	 				</div>			
				</div>
				<div class="col-md-3 offset-md-1">
					<div class="form-group">
					<label>Status</label>
					<select class="form-control single-select" name="status">
						<option value="">Select</option>
 					  	<option value="not_yet"> Not assign</option>
 					  	<option value="open"> Open</option>
 					  	<option value="closed"> Closed</option>
 	 				</select>
 	 				</div>			
				</div>
				@endrole
				<div class="col-md-4">
					<div class="form-group">
						<label></label>
						<button type="submit" class="btn btn-dark btn-block"><i class="fa fa-search fa-lg mr-2"></i> Search</button>			
					</div>
				</div>

			</div>
		</form> --}}

		<div class="row">
			<div class="col-md-10 offset-md-1">
				<table class="table table-hover">
				  <thead>
				    <tr>
				      <th scope="col">SUBJECT</th>      
		  		      <th scope="col">CLIENT NAME</th>	
		  		      <th scope="col">COMPANY  </th>	
		  		      <th scope="col">dated closed</th>	  		      
		  		      {{-- <th scope="col">..</th> --}}
				    </tr>
				  </thead>
				  <tbody>
				  	@foreach($requests as $request)
				    <tr>
				      <td><a href="{{route('manage.requests.show',$request->id)}}" >#{{$request->subjects}}</a> </td>
				      
				      <td><a href="{{route('manage.clients.show',$request->client->id)}}" >{{$request->client->name}}</a></td>
				      <td><a href="{{route('manage.clients.show',$request->client->id)}}" >{{$request->client->comapny}}</a></td>
				      @role('superadministrator')
		  		      <td> <a href="{{route('manage.requests.assign',$request->id)}} "><i class="fa fa-edit fa-lg"></i> RE-ASSIGN</a> </td>
		  		      @endrole
		  		      <td> {{ date( "F d, Y "  ,strtotime($request->updated_at)) }} </td>
		  		    {{--   @role('support')
		  		      <td> <a href="{{route('manage.requests.solve',$request->id)}} "><i class="fa fa-edit fa-lg"></i> Solve</a> </td>	  	
		  		      @endrole --}}
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