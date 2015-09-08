@extends('layouts.master')

@section('content')
	<h1>{{ $article->title }}</h1>

	<article>
		{{ $article->body }}
	</article>
	<hr>

	<a href="{{ url('article') }}" class="btn btn-info">Back To All Articles</a>
@stop