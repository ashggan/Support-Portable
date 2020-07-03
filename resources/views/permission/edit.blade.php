@extends('layouts.admin-dashboard')
@section('content')
<div class="container">
    
         {{-- <test></test> --}}
         <div class="box">
            <div class="col-md-8 offset-md-1">
                <h4>Edit permission</h4>
            </div>
            <form method="POST" action="{{ route('permission.update', $per->id) }}"  >
                @csrf
                <div class="form-group row mb-3">
                    <label for="name" class="col-md-8 offset-md-1 col-form-label text-md-left">{{ __('Permission Name') }}</label>

                    <div class="col-md-8 offset-md-1">
                        <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="display_name" value="{{  $per->display_name}}" required autofocus>

                        @if ($errors->has('display_name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('display_name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row  mb-3">
                    <label for="email" class="col-md-8 offset-md-1 col-form-label text-md-left">{{ __('Permission Description') }}</label>

                    <div class="col-md-8  offset-md-1">
                        {{-- <textarea  name="description" class="form-control" rows="2" value="{{  $per->display_name}}"></textarea> --}}
                        <input  type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ $per->description }}" required>

                        @if ($errors->has('description'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row mb-5 mt-5">
                    <div class="col-md-8 offset-md-1">
                        <button type="submit" class="btn btn-dark btn-block">
                            <i class="fa fa-lg fa-save mr-2"></i> SAVE
                        </button>
                    </div>
                </div>
            <input type="hidden" name="_method" value="put" />
 
            </form>
         </div>
 
    </div>
</div>
@endsection
 
