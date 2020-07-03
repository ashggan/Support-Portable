<div class="sidebar">    
<ul>
	<a href="{{route('client.dashboard')}}" >
		<li class="{{Route::current()->getName()== 'client.dashboard' ? 'active' :'' }}">Current requests</li>
	</a>
	<a href="{{route('request.create')}}">
		<li class="{{Route::current()->getName()== 'request.create' ? 'active' :'' }}">new request </li>
	</a>
	<a href="{{route('request.list')}}">
		<li class="{{Route::current()->getName()== 'request.list' ? 'active' :'' }}" >all requests</li>
	</a>
	<a href=" {{route('client.show',Auth::user()->id)}}">
		<li class="{{Route::current()->getName()== 'client.show' ? 'active' :'' }}">user profile</li>
	</a>
 </ul>       
</div>