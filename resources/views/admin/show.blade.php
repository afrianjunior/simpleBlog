@extends('layouts.master')

@section('content')
	<h1>{{ $article->title }}</h1>

	<article>
		{{ $article->body }}
	</article>
	<hr>

	<a href="{{ url('admin/article') }}" class="btn btn-info">Back To All Articles</a>
	<a href="{{ route('admin.edit', $article->id) }}" class="btn btn-info">Edit Article</a>

	<div class="pull-right">
		{!! Form::open([
			'method' => 'DELETE',
			'route' => ['admin.destroy', $article->id]
		]); !!}

		{!!  Form::submit('Delete this article?', ['class' => 'btn btn-danger']) !!}
		{!!  Form::close() !!}
	</div>
@stop