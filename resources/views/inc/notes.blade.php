@if(session('user_msg'))
<div class="row">
	<div class="col-md-10 offset-md-1 ">
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
		 user  <strong>{{ session('user_msg') }}   </strong> has been deleted . 
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>
 	</div>
</div>
@endif


@if(session('client'))
<div class="row">
	<div class="col-md-10 offset-md-1 ">
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
		 client  <strong>{{ session('client') }}   </strong> has been suspensed . 
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>
 	</div>
</div>
@endif


@if(session('client_activated'))
<div class="row">
	<div class="col-md-10 offset-md-1 ">
		<div class="alert alert-success alert-dismissible fade show" role="alert">
		 client  <strong>{{ session('client_activated') }}   </strong> has been activated . 
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>
 	</div>
</div>
@endif

@if(session('client_account_suspensed'))
<div class="row">
	<div class="col-md-10  ">
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
		 <p>Dear   <strong>{{ session('client_account_suspensed') }}   </strong>  your account has been suspensed .please <a href="http://maxnet-is.ae/contact" style="text-decoration: underline; color: #e69b1b;"> contact us </a>!</p>
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>
 	</div>
</div>
@endif

@if(session('del_req'))
<div class="row">
	<div class="col-md-10 offset-md-1 ">
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
		 Request    <strong>#{{ session('del_req') }}   </strong>  has been deleted. <br>
 		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>
 	</div>
</div>
@endif

@if(session('del_client'))
<div class="row">
	<div class="col-md-10 offset-md-1 ">
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
		 Client    <strong> {{ session('del_client') }}   </strong>  has been deleted. <br>
 		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>
 	</div>
</div>
@endif

@if(session('req_feedback'))
<div class="row">
	<div class="col-md-10 offset-md-1 ">
		<div class="alert alert-success alert-dismissible fade show" role="alert">
		 Request  status   <strong>#{{ session('req_feedback') }}   </strong>    <br>
 		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>
 	</div>
</div>
@endif