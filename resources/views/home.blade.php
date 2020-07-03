@extends('layouts.admin-dashboard')
{{-- @extends('layouts.app') --}}

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="box">
            <h4>Hello! {{Auth::user()->name}} </h4>
        </div>
    </div>
</div>
 
 
@endsection
