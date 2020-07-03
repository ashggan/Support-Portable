@extends('layouts.admin-dashboard')
@section('content')
<div class="container">
	<div class="box">
		<div class="row">
			<div class="col-md-8 mt-5 offset-md-1">
				<h4> {{$role->display_name}}</h4> 
				<p>{{$role->description }} </p> 
			</div>
		</div>
      	
      	<div class="row m-5">
 	      		@foreach($role->permissions as $per)
					<div class="col-md-3 mb-2">
						<div class="card">
						  <div class="card-body">
						  	<h6>{{$per->display_name}} </h6>
						    <p>{{$per->description}} </p> 
						  </div>
						</div>
					</div>
				@endforeach 
 		</div>	

 		<div class="row">
			<div class="col-md-8 mt-5 mb-5 offset-md-1">
				<a href="{{route('role.edit',$role->id)}} " class="btn btn-dark btn-block " ><i class="fa fa-edit fa-lg"></i> Edit</a>
			</div>
		</div>	    
    </div>
         
	</div>
</div>
@endsection