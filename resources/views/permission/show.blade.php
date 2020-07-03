@extends('layouts.admin-dashboard')
@section('content')
<div class="container">
	<div class="box">
 	    <div class="row mt-5 mb-2">
            <div class="col-md-7 offset-md-1"><h4>PERMISSION DETAILS</h4></div>
            <div class="col-md-8 offset-1">
               <p><strong>NAME: </strong> {{$per->display_name}} </p>  <br>
               <p><strong>DESCRIPTION :<br> </strong> {{$per->description }} </p>  
            </div>
        </div>
        <div class="row  mb-5 mt-5">
	        <div class="col-md-6 offset-md-1  align-self-center">
	            <a class="btn btn-dark btn-block " href="{{route('permission.edit',$per->id)}} "><i class="fa fa-lg fa-user mr-3"></i> Edit PERMISSION</a>
	        </div>
    	</div>
	</div>
</div>
@endsection
@section('script')


@endsection