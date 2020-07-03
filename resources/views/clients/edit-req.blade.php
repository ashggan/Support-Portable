 @extends('layouts.client-dashboard')

@section('content')

<div class="container mt-5">
    <div class="box">
        <div class="col-md-10 offset-1">
            <h4>Edir request </h4>
            
             <form action="{{route('request.submit')}}"  method="POST" enctype="multipart/form-data" >
                @csrf
                    <input type="hidden" name="id" value="{{ $req->id }} ">
                    <div class="form-group">
                        <label>Edit your Request</label>
                        <textarea class="form-control{{ $errors->has('detials') ? ' is-invalid' : '' }}" rows="10" id="article" name="detials">{{$req->detials }} </textarea>  
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
                    
                <input type="hidden" name="_method" value="put" />

                @if($req->status == "open")                  
                	<button class="btn btn-dark btn-block mt-5 mb-5" type="submit"><i class="fa fa-save fa-lg mr-3"></i> Save</button>
                	@elseif($req->status == "closed")
                	<button class="btn btn-dark btn-block mt-5 mb-5" type="submit"><i class="fa fa-save fa-lg mr-3"></i> Reopen</button>
                @else
                	<button class="btn btn-dark btn-block mt-5 mb-5" type="submit"><i class="fa fa-save fa-lg mr-3"></i> Update</button>
                @endif
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