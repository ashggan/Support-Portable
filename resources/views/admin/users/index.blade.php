@extends('layouts.admin-dashboard')
@section('style')
<link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
@endsection
@section('content')

<div class="container">
	<div class="box">
		@include('inc.notes')
	 
		<div class="row mt-5 mb-5">
			<div class="col-md-7 offset-md-1"><h4>Users</h4></div>
			<div class="col-md-3  align-self-center">
				<a class="btn btn-dark btn-block " href="{{route('users.create')}} "><i class="fa fa-lg fa-plus mr-3"></i> Create New user </a>
			</div>
		</div>


	<form action="{{route('admin.users.search')}}" method="POST" >
		{{ csrf_field() }}
		<div class="row mt-5 mb-5">
			<div class="col-md-4 offset-md-1">
				<label>Name</label>
				<select class="form-control single-select" name="name">
					<option value="">Select</option>
					@foreach($all_users as $user)
				  	<option value="{{$user->id}} ">{{$user->name}}</option>
					@endforeach
 				</select>			
			</div>
			<div class="col-md-4">
				<label>Role</label>
				<select class="form-control single-select" name="comapny">
					<option value="">Select</option>
					@foreach($roles as $role)
				  	<option value="{{$role->id}} ">{{$role->display_name}}</option>
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
				      <th scope="col">Name</th>
				      <th scope="col">Email</th>
				      <th scope="col">Role</th>
				      <th scope="col">Action</th>
				    </tr>
				  </thead>
				  <tbody>
				  	@foreach($users as $user)
				    <tr>
				      <td><a href="{{route('users.show',$user->id)}} " class="">{{$user->name}}</a></td>
				      <td>{{$user->email}}</td>
				      <td>@foreach($user->roles as $role )  {{$role->display_name }}  @endforeach</td>
				      <td>@if(Auth::user()->id != $user->id)  <a href="{{route('users.edit',$user->id)}} "><i class="fa fa-edit fa-lg"></i> Edit</a>@endif</td>
				    </tr>
				    @endforeach
			 	  </tbody>
				</table>
			</div>
		</div>
					
	</div>
		<div class="row mt-5 mb-5 justify-content-center">{{$users->links() }}</div>
	
</div>

@endsection
@section('script')
<script src="{{ asset('js/select2.min.js') }}" type="text/javascript"></script>
<script>
    $('.single-select').select2();
</script>
@endsection