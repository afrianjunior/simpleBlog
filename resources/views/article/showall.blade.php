@extends('layouts.master')

@section('content')

	<div class="row-fluid">
		<div class="col-md-9">
			<h1 class="page-header">Latest Article</h1>
			<div class="row">
				@foreach($articles as $article)
					<div class="col-md-12">
						<h2>{{ $article->title }}</h2>
						<article>
							<p>{{ $article->body }}</p>
						</article>
						<a href="{{ url('article', $article->id) }}" class="btn btn-info">View Article</a>
					</div>
					<hr>
				@endforeach					
			</div>
		</div>
	</div>
 
@stop