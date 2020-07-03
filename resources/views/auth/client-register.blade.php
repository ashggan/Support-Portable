<form action="{{route('client.register')}} " method="POST">

    <div class="form-group">
      <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="exampleInputPassword1" placeholder="NAME" required>
      @if ($errors->has('name'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('name') }}</strong>
          </span>
      @endif
    </div>

    <div class="form-group">
      <input type="text" name="company" class="form-control{{ $errors->has('company') ? ' is-invalid' : '' }}" id="exampleInputPassword1" placeholder="COMPANY" required>
      @if ($errors->has('company'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('company') }}</strong>
          </span>
      @endif
    </div>

    <div class="form-group">
      <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="EMAIL" required>
      @if ($errors->has('email'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('email') }}</strong>
          </span>
      @endif
    </div>                      
    <div class="form-group">
    
      <input type="text" name="phone" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" id="exampleInputPassword1" placeholder="PHONE" required>
      @if ($errors->has('phone'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('phone') }}</strong>
          </span>
      @endif
    </div>

      <div class="form-group">
         
          <input type="text" name="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"   placeholder="Description">
         @if ($errors->has('description'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('description') }}</strong>
          </span>
        @endif
        </div>

   <div class="form-group ">
       <input id="password" type="text" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" 
       placeholder="password" name="password" required>
          @if ($errors->has('password'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('password') }}</strong>
              </span>
          @endif
      </div>
 

   <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
    <button type="submit" class="btn btn-dark btn-block mt-5 mb-5">REGISTER</button>
</form>
 