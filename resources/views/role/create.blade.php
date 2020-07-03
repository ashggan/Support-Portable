@extends('layouts.admin-dashboard')
@section('content')
<div class="container">
    
         {{-- <test></test> --}}
         <div class="box">
            <div class="col-md-8 offset-md-1">
                <h4>New role</h4>
            </div>
            <form method="POST" action="{{ route('role.store') }}"  >
                @csrf
                <div class="form-group row mb-3">
                    <label for="name" class="col-md-8 offset-md-1 col-form-label text-md-left">{{ __('Role Name') }}</label>

                    <div class="col-md-8 offset-md-1">
                        <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="display_name" required autofocus>

                        @if ($errors->has('display_name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('display_name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row  mb-3">
                    <label for="email" class="col-md-8 offset-md-1 col-form-label text-md-left">{{ __('Role Description') }}</label>

                    <div class="col-md-8  offset-md-1">
                        <input  type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description"  required>

                        @if ($errors->has('description'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <hr>
                <div class="form-group row  mb-3">
                    <div class="col-md-8  offset-md-1">
                    <h4>Permissions</h4> 
                    @foreach($pers as $per)
                         <div class="col-md-8">                   
                            <input type="checkbox" class="form-check-input"  name="pers[]" value="{{$per->id}} ">
                            <label class="form-check-label" for="exampleCheck1"> {{$per->id}} {{$per->display_name}}</label>                      
                        </div>                          
                     @endforeach 
                    </div>
                </div>
                

                <div class="form-group row mb-5 mt-5">
                    <div class="col-md-8 offset-md-1">
                        <button type="submit" class="btn btn-outline-primary btn-block">
                            {{ __('Update') }}
                        </button>
                    </div>
                </div>
  
            </form>
         </div>
 
    </div>
</div>
@endsection
 
