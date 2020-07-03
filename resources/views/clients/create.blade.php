@extends('layouts.client-dashboard')
@section('content')

<div class="container">
<div class="box">
  <div class="row">
    <div class="col-md-10 offset-md-1">
      <h4>Create new Request  </h4>
      <form action="{{route('request.store')}} " method="POST" enctype="multipart/form-data">
        <input type="hidden" name="client_id" value="{{Auth::user()->id}} ">
        
        <div class="form-group mt-5">
          <label>Request Subject </label>
          <input type="text" name="subjects" class="form-control{{ $errors->has('subjects') ? ' is-invalid' : '' }}"  required>
          @if ($errors->has('subjects'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('subjects') }}</strong>
            </span>
          @endif
        </div>  

        <div class="form-group">
            <label>Tell us your Request</label>
            <textarea class="form-control{{ $errors->has('detials') ? ' is-invalid' : '' }}" name="detials" rows="10" id="article" required></textarea>
          @if ($errors->has('detials'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('detials') }}</strong>
            </span>
          @endif
        </div>      
        <label>Upload file(optional)</label>
        <input type="file" name="screenshots" class="form-control{{ $errors->has('detials') ? ' is-invalid' : '' }}" style="height: 100%">
          @if ($errors->has('screenshots'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('screenshots') }}</strong>
            </span>
          @endif
          
        <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
        <button type="submit" class="btn btn-dark btn-block mt-5 mb-5"><i class="fa fa-save mr-2 fa-lg"></i> save</button>
      </form>
    </div>
  </div>
    

</div>
</div>

@endsection

@section('script')
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script>
        CKEDITOR.replace('article');
    </script>
@endsection