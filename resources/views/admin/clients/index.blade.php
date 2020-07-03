@extends('layouts.admin-dashboard')
@section('style')
<link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
@endsection
@section('content')

<div class="container">
	<div class="box">
		@include('inc.notes')
		<div class="row mt-5 mb-5">
			<div class="col-md-7 offset-md-1"><h4>clients</h4></div>
		</div>

	<form action="{{route('manage.clients.search')}}" method="POST" >
		{{ csrf_field() }}
		<div class="row mt-5 mb-5">
			<div class="col-md-4 offset-md-1">
				<label>Name</label>
				<select class="form-control single-select" name="name">
					<option value="">Select</option>
					@foreach($all_clients as $client)
				  	<option value="{{$client->name}} ">{{$client->name}}</option>
					@endforeach
 				</select>			
			</div>
			<div class="col-md-4">
				<label>Company</label>
				<select class="form-control single-select" name="comapny">
					<option value="">Select</option>
					@foreach($all_clients as $client)
				  	<option value="{{$client->comapny}} ">{{$client->comapny}}</option>
					@endforeach
 				</select>			
			</div>
			<div class="col-md-2">
				<label></label>
				<button type="submit" class="btn btn-dark btn-block"><i class="fa fa-search fa-lg mr-2"></i> Search</button>			
			</div>
		</div>
	</form>

	<div class="row">
		<div class="col-md-10 offset-md-1">
			<table class="table table-hover">
			  <thead>
			    <tr>
			      <th scope="col">NAME</th>
	  		      <th scope="col">COMPANY</th>
	  		      {{-- <th scope="col">  #RREQUESTS</th> --}}
	  		      {{-- <th scope="col">{{$clients->count()}} ..</th> --}}
			    </tr>
			  </thead>
			  <tbody>
			  	@foreach($clients as $client)
			  	@if($client->suspense )
				<tr class="table-danger">
			      <td><i class="fa fa-close fa-lg mr-2" style="color: red"></i> <a href="{{route('manage.clients.show',$client->id)}}" >{{$client->name}}</a> </td>
			      <td> {{$client->comapny}} </td>
			      {{-- <td><a href="#" > </a></td> --}}
	  		      {{-- <td> <a href="#"><i class="fa fa-edit fa-lg"></i> </a> </td> --}}
			    </tr>
			  	@else 
			    <tr  class=" ">
			      <td><a href="{{route('manage.clients.show',$client->id)}}" >{{$client->name}}</a> </td>
			      <td> {{$client->comapny}} </td>
			      {{-- <td><a href="#" > </a></td> --}}
	  		      {{-- <td> <a href="#"><i class="fa fa-edit fa-lg"></i> </a> </td> --}}
			    </tr>
			    @endif
			    @endforeach
		 	  </tbody>
			</table>
		</div>
	</div>  				

	<div class="row justify-content-center mt-5 mb-5">{{$clients->links() }}</div>	
	</div>	 		
	
</div>

@endsection

@section('script')
<script src="{{ asset('js/select2.min.js') }}" type="text/javascript"></script>
<script>
    $('.single-select').select2();
</script>
@endsection
