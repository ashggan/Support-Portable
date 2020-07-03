@extends('layouts.admin-dashboard')
@section('content')
<div class="container">
    <div class="box">
        <div class="row mt-5 mb-2">
            <div class="col-md-7 ml-5">
                <h4>Edit {{$user->name}}</h4>
            </div>       
        </div>

<form method="POST" action="{{ route('user.profile.change', $user->id) }}"  >
    <div class="row">
        <div class="col-md-8 ">
            @csrf
            <div class="form-group row mb-3">
                <label for="name" class="col-md-8 offset-md-1 col-form-label text-md-left">{{ __('Name') }}</label>

                <div class="col-md-10 offset-md-1">
                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{  $user->name}}" required autofocus>

                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row  mb-3">
                <label for="email" class="col-md-8 offset-md-1 col-form-label text-md-left">{{ __('E-Mail Address') }}</label>

                <div class="col-md-10  offset-md-1">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $user->email }}" required>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row mb-3">
                <label for="password" class="col-md-8 offset-md-1 col-form-label text-md-left">Reset Password </label>

                <div class="col-md-10 offset-md-1">
                    <input id="password" type="text" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" >

                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>                        
            <input type="hidden" name="_method" value="put" /> 
        </div>   
    </div>  
    <div class="row">
        <div class="col-md-8 ">
            <div class="form-group row mb-5 mt-5">
            <div class="col-md-10 offset-md-1">
                <button type="submit" class="btn btn-dark btn-block">
                 <i class="fa fa-lg fa-save mr-2"></i>   SAVE 
                </button>
            </div>
        </div>
        </div>
       
    </div>  
 </form>                

    </div>
</div>

@endsection
