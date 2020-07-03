@extends('layouts.admin-dashboard')

@section('content')

<div class="container">
	<div class="box">
		<div class="row mt-5 mb-5">
			<div class="col-md-7 offset-md-1"><h4>Permissionrs</h4></div>
			<div class="col-md-3  align-self-center">
				<a class="btn btn-dark btn-block" href="#"><i class="fa fa-lg fa-lock mr-3"></i> Create New permission
				</a>
			</div>
		</div>

		<div class="row">
			<div class="col-md-10 offset-md-1">
				<table class="table table-hover">
				  <thead>
				    <tr>
				      <th scope="col">Name</th>
		  		      <th scope="col">Action</th>
				    </tr>
				  </thead>
				  <tbody>
				  	@foreach($pers as $per)
				    <tr>
				      <td><a href="{{route('permission.show',$per->id)}} " class="">{{$per->display_name}} </a> </td>
		  		      <td> <a href="{{route('permission.edit',$per->id)}} "><i class="fa fa-edit fa-lg"></i> Edit</a> </td>
				    </tr>
				    @endforeach
			 	  </tbody>
				</table>
			</div>
		</div>
				

		<div class="row justify-content-center mt-5 mb-5">{{$pers->links() }}</div>	
	</div>
		
	
</div>

@endsection