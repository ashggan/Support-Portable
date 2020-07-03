@extends('layouts.admin-dashboard')
@section('content')

<div class="container">
	<div class="box">
		<div class="row">
			<div class="col-md-10 offset-md-1">
				<h4>create new client </h4>
            	@include('auth.client-register')			
			</div>
 		</div>
 	</div>
</div>

@endsection