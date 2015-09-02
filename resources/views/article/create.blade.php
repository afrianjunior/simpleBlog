@extends('layouts.master')

@section('content')
	<h1>Write A New Article</h1>
	<hr>

	{!! Form::open(['url' => 'article']) !!}
		<div class="form-group">
			{!! Form::label('title', 'Title:') !!}
			{!! Form::text('title', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('body', 'Body:') !!}
			{!! Form::textarea('body', null, ['class' => 'form-control']) !!}
		</div>
		{!! Form::submit('Add Article', ['class' => 'btn btn-primary form-control']) !!}

	{!! Form::close() !!}

	@if($errors->any())
		<div class="alert alert-danger">
			@foreach($errors->all() as $error)
				<p>{{ $error }}</p>
			@endforeach
		</div>	
	@endif

	@if(Session::has('flash_message'))
		<div class="alert alert-success">
			{{ Session::get('flash_message') }}
		</div>
	@endif
@stop