<div class="sidebar">    
	<ul>
		
		
		

		@role('superadministrator|administrator')
		<a href="{{route('manage.requests')}}" >
			<li class="{{Route::current()->getName()== 'manage.requests' ? 'active' :'' }}">all requests</li>
		</a>
		
		 
		<a href="{{route('manage.requests.closed')}}">
			<li class="{{Route::current()->getName()== 'manage.requests.closed' ? 'active' :'' }}"> closed requests  </li>
		</a>

		<a href="{{route('manage.clients')}}">
			<li class="{{Route::current()->getName()== 'manage.clients' ? 'active' :'' }}"> clients   </li>
		</a>
		@endrole


		@role('support')
		<a href="{{route('manage.requests')}}">
			<li class="{{Route::current()->getName()== 'manage.requests' ? 'active' :'' }}"> Assigned requests  </li>
		</a>
		<a href="{{route('manage.requests.closed')}}">
			<li class="{{Route::current()->getName()== 'manage.requests.closed' ? 'active' :'' }}"> closed requests  </li>
		</a>
		@endrole
		@role('superadministrator')
		<a href="{{route('client.page')}}" >
			<li class="{{Route::current()->getName()== 'client.page' ? 'active' :'' }}"> register client </li>
		</a>
		
		@endrole

		@role('superadministrator')
 		<a href="{{route('users.index')}} " >
			<li class= "{{Route::current()->getName()== 'users.index' ? 'active' :'' }}"> user amangment  </li>
		</a>
		{{-- <a href="{{route('role.index')}}" >
			<li class="{{Route::current()->getName()== 'role.index' ? 'active' :'' }}">roles</li>
		</a> --}}
		
		@endrole

		<a href="{{route('user.profile.modify')}}">
			<li class="{{Route::current()->getName()== 'user.profile.modify' ? 'active' :'' }}"> Profile   </li>
		</a>

		
	 </ul>       
</div>










		{{-- <a href="{{route('permission.index')}} " >
			<li class="{{Route::current()->getName()== 'permission.index' ? 'active' :'' }}">Permission</li>
		</a> --}}
		