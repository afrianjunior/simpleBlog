@extends('app')

@section('content')

<div class="row">
	<div class="col-md-12">
		<h1 class="page-header">Dashboard</h1>

      	@if(session()->has('flash_message'))
        	<div class="alert alert-success">
        		{{ session('flash_message') }}
        	</div>
    	@endif

	</div>
</div>

@endsection