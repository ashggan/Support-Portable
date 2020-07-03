@extends('layouts.admin-dashboard')
@section('content')
<div class="container">
    
         {{-- <test></test> --}}
         <div class="box">
            <div class="col-md-8 offset-md-1">
                <h4>Edit {{$role->display_name }}</h4>
            </div>

            <form method="POST" action="{{ route('role.update', $role->id) }}"  >
                @csrf
                <div class="row mt-5">
                    <div class="col-md-8 mt-5">
                        <div class="form-group row mb-3">
                            <label for="name" class="col-md-8 offset-md-1 col-form-label text-md-left">{{ __('Permission Name') }}</label>

                            <div class="col-md-10 offset-md-1">
                                <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="display_name" value="{{  $role->display_name}}" required autofocus>

                                @if ($errors->has('display_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('display_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row  mb-3">
                            <label for="email" class="col-md-8 offset-md-1 col-form-label text-md-left">{{ __('Permission Description') }}</label>

                            <div class="col-md-10  offset-md-1">
                                <input  type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ $role->description }}" required>

                                @if ($errors->has('description'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>   
                    </div>
                 {{--    <div class="col-md-4">
                        <div class="form-group row  mb-3">
                            <div class="col-md-8  offset-md-1">
                            <h4>Permissions</h4> 
                            @foreach($pers as $per)
                                <div class="col-md-8">                   
                                    <input type="checkbox" class="form-check-input" {{in_array($per->id, $role->permissions->pluck('id')->toArray() ) ? 'checked' : ''}} name="pers[]" value="{{$per->id}} ">
                                    <label class="form-check-label" for="exampleCheck1">   {{$per->display_name}}</label>                      
                                </div>                          
                            @endforeach 
                            </div>
                            </div>
                    </div> --}}
                </div>
                    

                <hr>
                
                

                <div class="form-group row mb-5 mt-5">
                    <div class="col-md-6 offset-md-1">
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
 
