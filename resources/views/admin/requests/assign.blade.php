@extends('layouts.admin-dashboard')
@section('content')
<div class="container">
    <div class="box">
        <div class="col-md-8 offset-md-1 mb-5">
            <h4>Request solution # {{$req->ticket}}</h4>
        </div>

            <form method="POST" action="{{ route('manage.requests.assigned', $req->id) }}"  >
                @csrf
                <div class="form-group row mb-3">
 
                    <div class="col-md-8 offset-md-1">
                        <label class="mt-2"> Select an assignee </label>

                        <select class="form-control{{ $errors->has('assignee') ? ' is-invalid' : '' }}" required autofocus name="assignee"> 
                            {{-- <option value="">Select </option> --}}
                            @foreach($users as $user)
                            @if($user->hasRole('support'))
                            <option value="{{$user->id}} " >{{$user->name}} </option>
                            @endif
                            @endforeach
                            
                        </select>

                        @if ($errors->has('assignee'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('assignee') }}</strong>
                            </span>
                        @endif
                    </div>
               
                   
                    <div class="col-md-8 offset-md-1">
                        <label class="mt-2"> Select Prioirty </label>
                        <select class="form-control{{ $errors->has('prioirty') ? ' is-invalid' : '' }}" required autofocus name="prioirty"> 
                            {{-- <option value="">Select</option> --}}
                            <option value="high" > High </option>
                            <option value="normal" > Meduim </option>
                            <option value="low" > Low </option>
                            
                        </select>

                        @if ($errors->has('prioirty'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('prioirty') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="col-md-8 offset-md-1">
                        <label class="mt-2"> Set a lead time (hours) </label>
                        <input type="text" class="form-control{{ $errors->has('leadtime') ? ' is-invalid' : '' }}" name="leadtime" value="{{$req->leadtime}} ">
                        @if ($errors->has('leadtime'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('leadtime') }}</strong>
                            </span>
                        @endif
                    </div>

                </div>
                <input type="hidden" name="_method" value="put" />
                <div class="form-group row mb-5 mt-5">
                    <div class="col-md-8 offset-md-1">
                        @if($req->status = "not_yet")
                        <button type="submit" class="btn btn-dark btn-block">
                            <i class="fa fa-lg fa-save mr-2"></i> ASSIGN
                        </button>
                        @else
                        <button type="submit" class="btn btn-dark btn-block">
                            <i class="fa fa-lg fa-save mr-2"></i> RE-ASSIGN
                        </button>
                        @endif
                    </div>
                </div>
           
 
            </form>
         </div>
 
    </div>
</div>
@endsection