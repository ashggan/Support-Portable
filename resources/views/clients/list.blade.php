@extends('layouts.client-dashboard')

@section('content')
<div class="container">
	<div class="box">

	<form action="{{route('request.search')}}" method="POST" >
		{{ csrf_field() }}
		<div class="row mt-5 mb-5">
			
			<div class="col-md-5 offset-md-1">
				<div class="form-group">
				<label>Status</label>
				{{-- <select class="form-control  single-select" name="status"> --}}
				<select class="form-control  " name="status">
					<option value="">Select</option>
 				  	<option value="open">assigned</option>
 				  	<option value="not_yet">new  </option>
 				  	<option value="canceled">canceled </option>
 				  	<option value="feedback">feedback </option>
 				  	<option value="closed">Closed </option>
  				</select>	
  				</div>		
			</div>
			<div class="col-md-5">
				<div class="form-group">

				<label>.</label>
				<button type="submit" class="btn btn-dark btn-block" style="padding-top: 5px"><i class="fa fa-search fa-lg mr-2"></i> Search</button>	</div>		
			</div>
		</div>
	</form>
		<div class="row">
			<div class="col-md-10 offset-1 mt-5 mb-5">
				<table class="table table-hover">
				  <thead>
				    <tr>
				      <th scope="col">Ticket</th>
				      <th scope="col">SUBJECTS</th>
		  		      <th scope="col">Date Created</th>
		  		      <th scope="col">  status</th>
		  		      <th scope="col">...</th>
				    </tr>
				  </thead>
				  <tbody>
				  	@foreach($reqs as $req)
				    <tr @if($req->status=="closed") class="table-success" 
				    	@elseif($req->status=="not_yet") class="table-light" 
				    	@elseif($req->status=="feedback") class="table-info" 
				    	@elseif($req->status=="canceled") class="table-danger" 
				    	@elseif($req->status=="open") class="table-warning" 
				    	@endif>

					      <td><a href="{{route('request.show',$req->id)}}" >#{{$req->ticket}}</a> </td>
					      <td><a href="{{route('request.show',$req->id)}}" >{{$req->subjects}}</a> </td>
					      <td> {{date("F d, Y", strtotime($req->created_at ))}} </td>
					      <td>  
							@if($req->status=="closed") CLOSED
					    	@elseif($req->status=="not_yet") NEW 
					    	@elseif($req->status=="feedback") FEEDBACK
					    	@elseif($req->status=="canceled") CANCELLED
					    	@elseif($req->status=="open") ASSIGNED
					    	@endif
					      </td>
			  		      <td> <a href="{{route('client.edit-req',$req->id)}}"><i class="fa fa-edit fa-lg"></i> </a> </td>

				    </tr>
				    @endforeach
			 	  </tbody>
				</table>
			</div>
		</div>
		<div class="row justify-content-center mt-5 mb-5">{{$reqs->links() }}</div>	

	</div>	
</div>
</div>
@endsection

@section('script')
<script src="{{ asset('js/select2.min.js') }}" type="text/javascript"></script>
<script>
    $('.single-select').select2();
</script>
@endsection