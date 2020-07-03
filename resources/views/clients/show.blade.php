@extends('layouts.client-dashboard')
@section('content')

<div class="container">
	<div class="box">
		<div class="row">
			<div class="col-md-5 offset-md-1">
				<h4> {{ $client->name}}  </h4>
			</div>
		</div>
		<div class="row">
			
			<div class="col-md-5 offset-md-1">
				
	 			 <ul class="list" >
				 	<li><i class="fa fa-envelope fa-lg mr-3"></i> <strong>Created on :<br> </strong> {{$client->created_at}} </li>
				 	<li><i class="fa fa-envelope fa-lg mr-3"></i> <strong>Email :<br> </strong> {{$client->email}} </li>
				 	<li><i class="fa fa-building-o fa-lg mr-3"></i><strong>Company :<br></strong> {{$client->comapny}} </li>
				 	<li><i class="fa fa-phone fa-lg mr-3"></i><strong>Phone :<br></strong> {{$client->phone}} </li>
				 	<li><strong>Description :<br></strong> {{  $client->description  }} </li>
				 </ul>	
				<a class="btn btn-dark btn-block mt-5 mb-5" href="{{route('client.edit',$client->id)}} "> <i class="fa fa-edit fa-lg"></i> EDIT </a>

			</div>
			<div class="col-md-5 offset-md-1">
				<h6>requests info</h6>
				<table class="table table-striped table-dark">
	
				    {{-- <thead>
					    <tr>
					      <th scope="col">#</th>
					      <th scope="col">First</th>
					      <th scope="col">Last</th>
					      <th scope="col">Handle</th>
					    </tr>
				    </thead> --}}
					  <tbody>
					    <tr>
 					      <td>New</td>
 					      <td>{{$notReqs->count()}}</td>
 					  </tr>
 					  <tr>
 					  	<td>Assigned</td>
 					  	<td>{{$openReqs->count()}} </td>
 					  </tr>
 					  <tr>
 					  	<td>Closed</td>
 					  	<td>{{$closedReqs->count()}}</td>
 					  </tr>
 					  <tr>
 					  	<td>Cancelled</td>
 					  	<td>{{$cancelReqs->count()}}</td>
  					  </tr>
 					  <tr>
 					  	<tr>
 					  	<td>Feedback</td>
 					  	<td> {{$feedbackReqs->count()}}</td>
  					  </tr>
 					  <tr>
 					  	<td>Total</td>
 					  	<td>{{$reqs->count()}}</td>
  					  </tr>
					</tbody>
				</table>
	 			{{--  <ul class="list" >
	 			 	<li><strong> open</strong>  {{$feedbackReqs->count()}} </li>
	 			 	<li><strong> closed</strong>{{$closedReqs->count()}} </li>
	 			 	<li><strong> newly openned </strong> {{$notReqs->count()}} </li>
	 			 	<li><strong> total </strong> {{$reqs->count()}} </li>
	 			 </ul> --}}
			</div>
		</div>
		<div class="row">
			<div class="col-md-5 offset-md-1">
				{{-- <a class="btn btn-dark btn-block mt-5 mb-5" href="{{route('client.edit',$client->id)}} "> <i class="fa fa-edit fa-lg"></i> EDIT </a> --}}
			</div>
		</div>
		
			 
		

 	</div>
</div>

@endsection