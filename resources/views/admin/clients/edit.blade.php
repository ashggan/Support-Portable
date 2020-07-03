@extends('layouts.admin-dashboard')
@section('content')

<div class="container">
	<div class="box">
		<div class="row">
			<div class="col-md-10 offset-md-1">
				<h4>Edit client </h4>
        <form action="{{route('admin.client.update',$client->id)}} " method="POST">
        <div class="form-group mt-5">
          <label>NAME</label>
          <input type="text" name="name" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"   placeholder="NAME" value="{{$client->name}} ">
          @if ($errors->has('name'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('name') }}</strong>
          </span>
      @endif
        </div>
        <div class="form-group">
          <label>COMPANY</label>

          <input type="text" name="company" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"   placeholder="COMPANY"  value="{{$client->comapny}} ">
          @if ($errors->has('company'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('company') }}</strong>
          </span>
      @endif
        </div>
        <div class="form-group">
          <label>EMAIL</label>

          <input type="email" name="email" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"  value="{{$client->email}} " placeholder="EMAIL">
        @if ($errors->has('email'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('email') }}</strong>
          </span>
      	@endif
        </div>                      
        <div class="form-group">
          <label>PHONE</label>
        
          <input type="text" name="phone" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"  value="{{$client->phone}} " placeholder="PHONE">
        @if ($errors->has('phone'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('phone') }}</strong>
          </span>
      	@endif 
        </div>

        <div class="form-group">
          <label>Description</label>
        
          <input type="text" name="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"  value="{{$client->description}} " placeholder="Description">
         @if ($errors->has('description'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('description') }}</strong>
          </span>
        @endif
        </div>

        <div class="form-group ">
          <label>PASSWORD</label>

           <input  type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" 
           placeholder="password" name="password" >
             
          </div>

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