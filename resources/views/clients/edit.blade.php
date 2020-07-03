@extends('layouts.client-dashboard')
@section('content')

<div class="container">
<div class="box">
  <div class="row">
    <div class="col-md-10 offset-md-1">
      <h4>EDIT {{$client->name}}</h4>
      <form action="{{route('client.update',$client->id)}} " method="POST">
        <div class="form-group mt-5">
          <label>NAME</label>
          <input type="text" name="name" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"   placeholder="NAME" value="{{$client->name}} ">
        </div>
        <div class="form-group">
          <label>COMPANY</label>

          <input type="text" name="company" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"   placeholder="COMPANY"  value="{{$client->comapny}} " disabled>
        </div>
        <div class="form-group">
          <label>EMAIL</label>

          <input type="email" name="email" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"  value="{{$client->email}} " placeholder="EMAIL" disabled>
        </div>                      
        <div class="form-group">
          <label>PHONE</label>
        
          <input type="text" name="phone" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"  value="{{$client->phone}} " placeholder="PHONE">
        </div>

        <div class="form-group">
          <label>Description</label>
        
          <input type="text" name="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"  value="{{$client->description}} " placeholder="PHONE">
        </div>

        <div class="form-group ">
          <label>RESET PASSWORD</label>

           <input  type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" 
           placeholder="password" name="password" >
             
          </div>
          {{-- <input type="file" name="photo"> --}}

          {{-- <div class="form-group">
          <label>CONFIRM PASSWORD</label>

          <input id="password-confirm" placeholder="Password Confirm" type="password" class="form-control" name="password_confirmation">
        </div> --}}

        <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
        <input type="hidden" name="_method" value="put" />
        <button type="submit" class="btn btn-dark btn-block mt-5 mb-5"><i class="fa fa-save mr-2 fa-lg"></i> save</button>
      </form>
    </div>
  </div>
	

</div>
</div>

@endsection