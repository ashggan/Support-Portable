@extends('layouts.admin-dashboard')
@section('content')
<div class="container">
    <div class="box">
        <div class="col-md-8 offset-md-1 mb-5">
            <h4>Request solution #{{$req->ticket}} </h4>
        </div>

            <form method="POST" action="{{ route('manage.requests.solved', $req->id) }}" enctype="multipart/form-data" >
                @csrf
                <div class="form-group row mb-3"> 
 
                    <div class="col-md-10 offset-md-1">
                        <textarea class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value=" " name="solution" required autofocus rows="10" id="article">{{$req->solution}}</textarea>

                        @if ($errors->has('solution'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('solution') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row mb-5 mt-5">
                    <div class="col-md-10 offset-md-1">
                        <label>Uplaoad an attachment (optional)</label>
                        <input type="file" name="attachment" class="form-control" style="height: 100%;">
                    </div>
                    
                </div>
                <input type="hidden" name="_method" value="put" />
                <div class="form-group row mb-5 mt-5">
                    <div class="col-md-10 offset-md-1">
                        <button type="submit" class="btn btn-dark btn-block">
                            <i class="fa fa-lg fa-save mr-2"></i> SAVE
                        </button>
                    </div>
                </div>
           
 
            </form>
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