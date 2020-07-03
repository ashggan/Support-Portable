@extends('layouts.admin-dashboard')
@section('content')

<div class="container">
	<div class="box">
		<div class="row">
			<div class="col-md-5 offset-md-1">
				@if($client->suspense)
				  <h4><i class="fa fa-close fa-lg mr-2" style="color: red"></i> {{ $client->name}}  </h4>

				@else
				<h4> {{ $client->name}}  </h4>
				@endif
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
			</div>
			<div class="col-md-5 offset-md-1">
				<h6>request info</h6>
	 			 <ul class="list" >
	 			 	<li><strong> open</strong>  {{$openReqs->count()}} </li>
	 			 	<li><strong> closed</strong>{{$closedReqs->count()}} </li>
	 			 	<li><strong> newly openned </strong> {{$notReqs->count()}} </li>
	 			 	<li><strong> total </strong> {{$reqs->count()}} </li>
	 			 </ul>
			</div>
		</div>
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-3">
				@role('superadministrator')
				<a class="btn btn-dark btn-block mt-5 mb-5" href="{{route('manage.client.edit',$client->id)}} "> <i class="fa fa-edit mr-3 fa-lg"></i> EDIT </a>
				@endrole
			</div>
			@role('superadministrator')
			<div class="col-md-3">
				
				<form action="{{route('manage.clients.suspense',$client->id)}}" method="POST">
          		@csrf
                <input type="hidden" name="_method" value="put" /> 
                @if($client->suspense)
                <button class="btn btn-dark btn-block mt-5 mb-5" type="submit"> <i class="fa fa-toggle-on mr-3 fa-lg"></i> Activate </button>
                @else
                <button class="btn btn-dark btn-block mt-5 mb-5" type="submit"> <i class="fa fa-stop-circle-o mr-3 fa-lg"></i> SUSPENSE </button>
                @endif			
				</form>			
			</div>
			<div class="col-md-3">
				<form action="{{route('manage.clients.delete',$client->id)}}" method="POST">
          		@csrf
                <input type="hidden" name="_method" value="delete" /> 				
            	<button class="btn btn-block btn-dark mt-5 mb-5" type="submit"><i class="fa-lg fa fa-trash mr-3"></i> Delete</button>
            	</form>
 			</div>

 			@endrole
		</div>
		
			 
		

 	</div>
</div>

@endsection