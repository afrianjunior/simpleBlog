@extends('app')

@section('content')
<h1>Article Listing <a href="/admin/article/create" class="btn btn-primary pull-right">Create New Article</a></h1>
<hr>
	@foreach($articles as $article)
		<h2>{{ $article->title }}</h2>
		<article>
			<p>{{ $article->body }}</p>
		</article>
		<a href="{{ url('admin/article', $article->id) }}" class="btn btn-info">View Article</a>
		<a href="{{ route('admin.edit', $article->id) }}" class="btn btn-warning">Edit Article</a>
	@endforeach
		<hr>
 
@stop