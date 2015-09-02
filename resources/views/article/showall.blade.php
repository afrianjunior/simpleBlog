@extends('layouts.master')

@section('content')
<h2><a href="article/create">Create New Article</a></h2>
<hr>
	@foreach($articles as $article)
		<h2>{{ $article->title }}</h2>
		<article>
			<p>{{ $article->body }}</p>
		</article>
		<a href="{{ url('article', $article->id) }}" class="btn btn-info">View Article</a>
		<a href="{{ route('article.edit', $article->id) }}" class="btn btn-primary">Edit Article</a>
	@endforeach
		<hr>
 
@stop