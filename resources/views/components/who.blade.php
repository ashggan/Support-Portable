@if(Auth::guard('web')->check())
<h3>you are   <b>logged in  </b> as user</h3>
@else
<h3>you are <b>logged out </b> as user</h3>

@endif

@if(Auth::guard('client')->check())
<h3>you are <b>logged in</b>  as client</h3>
@else
<h3>you are <b>logged out </b> as client</h3>

@endif