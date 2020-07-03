@extends('layouts.admin-dashboard')
@section('content')
<div class="container">
	
         {{-- <test></test> --}}
         <div class="box">
            <div class="col-md-8 offset-md-1">
                <h4>New user</h4>
            </div>
            <form method="POST" action="{{ route('users.store') }}" aria-label="{{ __('Register') }}">
                @csrf

                <div class="form-group row mb-3">
                    <label for="name" class="col-md-8 offset-md-1 col-form-label text-md-left">{{ __('Name') }}</label>

                    <div class="col-md-8 offset-md-1">
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row  mb-3">
                    <label for="email" class="col-md-8 offset-md-1 col-form-label text-md-left">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-8  offset-md-1">
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label for="password" class="col-md-8 offset-md-1 col-form-label text-md-left">{{ __('Password') }}</label>

                    <div class="col-md-8 offset-md-1">
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label for="password-confirm" class="col-md-8 offset-md-1 col-form-label text-md-left">{{ __('Confirm Password') }}</label>

                    <div class="col-md-8 offset-md-1">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                    </div>
                </div>

                <div class="form-group row mb-5 mt-5">
                    <div class="col-md-8 offset-md-1">
                        <button type="submit" class="btn btn-dark btn-block">
                            {{ __('Register') }}
                        </button>
                    </div>
                </div>
            </form>
         </div>
 
	</div>
</div>
@endsection
