@extends('layouts.admin-dashboard')
@section('content')
<div class="container">
	<div class="box">

        <div class="row mt-5 mb-2">
            <div class="col-md-7 offset-md-1"><h4>Users</h4></div>
            <div class="col-md-8 offset-1">
               <p><strong>NAME: </strong> {{$user->name}} </p>  <br>
               <p><strong>EMAIL: </strong> {{$user->email}} </p>  
            </div>
        </div>
    <hr>
    <div class="row   mb-5">
        <div class="col-md-8 offset-1">
            <h6>roles</h6>
            @if($user->roles->count() == 0 )
            <p> {{ $user->name}} has no roles </p>
            @else
            <ul>
            @foreach($user->roles as $role)
            <li>{{$role->display_name}} <br> <p class="mt-2">{{$role->description}} </p>  </li>
            @endforeach
           </ul>
            @endif 
        </div>  
    </div>
    @role('superadministrator')
    @if(Auth::user()->id != $user->id) 
    <div class="row  mb-5">
        <div class="col-md-3 offset-md-1  align-self-center">
            <a class="btn btn-dark btn-block " href="{{route('users.edit',$user->id)}} "><i class="fa fa-lg fa-user mr-3"></i> Edit USER</a>
        </div>
         
        <div class="col-md-3 align-self-center">
            <form action="{{route('users.destroy',$user->id)}}" method="POST">
            @csrf
                <input type="hidden" name="_method" value="DELETE" /> 
                <button class="btn btn-dark btn-block " type="submit"><i class="fa fa-lg fa-trash mr-3"></i> DELETE USER</button>   
            </form>
            
        </div>
    </div>
    @endif
    @endrole

	
    
    </div>
</div>
 @endsection
@section('script')


@endsection