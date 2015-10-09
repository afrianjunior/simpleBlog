@extends('layouts.master')

@section('content')

    <div class="row">
    	<div class="col-md-12">
    		<h1 class="page-header">Welcome to My Blog!</h1>
    	</div>
    	<div class="col-md-9">
    		@if(session()->has('flash_message'))
		        <div class="alert alert-success">
		          {{ session('flash_message') }}
		        </div>
		    @endif
    	</div>
    	<div class="col-md-3">
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				<strong>Categories</strong>
    			</div>
    			<div class="panel-body">
    				<ul>
    					<li><a href="#"></a>Undefined</li>
    					<li><a href="#"></a>Wohooo</li>
    					<li><a href="#"></a>Awkward</li>
    				</ul>
    			</div>
    		</div>
    	</div>
    </div>

@endsection
