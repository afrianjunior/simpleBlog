@extends('layouts.master')

@section('content')
	<h1>Edit Article - "{{ $article->title }}"</h1>
	<p class="lead">Edit this article below. <a href="{{ url('article') }}">Go Back to all articles</a></p>
	<hr>

@include('partials.alerts.errors')

@if(Session::has('flash_message'))
	<div class="alert alert-success">
		{{ Session::get('flash_message') }}
	</div>
@endif

	{!! Form::model($article, [
		'method' => 'PUT',
		'route' => ['article.update', $article->id]
	]) !!}

	<div class="form-group">
		{!! Form::label('title', 'Title:') !!}
		{!! Form::text('title', null, ['class' => 'form-control']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('body', 'Body:') !!}
		{!! Form::textarea('body', null, ['class' => 'form-control']) !!}
	</div>

	{!! Form::submit('Update Article', ['class' => 'btn btn-primary form-control']) !!}

	{!! Form::close() !!}
@stop
