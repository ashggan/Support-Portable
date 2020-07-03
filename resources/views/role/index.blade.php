@extends('layouts.admin-dashboard')

@section('content')

<div class="container">
	<div class="box">
		<div class="row mt-5 mb-5">
			<div class="col-md-7 offset-md-1"><h4>roles</h4></div>
			<div class="col-md-3  align-self-center">
				{{-- <a class="btn btn-dark btn-block " href="{{route('role.create')}}"><i class="fa fa-lg fa-role mr-3"></i> Create New role --}}
				{{-- </a> --}}
			</div>
		</div>
		<div class="row">
			<div class="col-md-10 offset-md-1 mb-5">
				<table class="table table-hover">
				  <thead>
				    <tr>
				      <th scope="col">Name</th>
		  		      <th scope="col">Action</th>
				    </tr>
				  </thead>
				  <tbody>
				  	@foreach($roles as $role)
				    <tr>
				      <td><a href="{{route('role.show',$role->id)}} " class="">{{$role->display_name}} </a> </td>
		  		      <td> <a href="{{route('role.edit',$role->id)}} "><i class="fa fa-edit fa-lg"></i> Edit</a> </td>
				    </tr>
				    @endforeach
			 	  </tbody>
				</table>
				{{-- <div class="row justify-content-center mt-5 mb-5">{{$roles->links() }}</div>					 --}}
			</div>
		</div>
				

	</div>
		
	
</div>

@endsection