@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="col-md-9">
			<h1 class="page-header">{{ $article->title }} <a href="{{ url('article') }}" class="btn btn-info pull-right">Back To All Articles</a></h1>
			<article>
				{{ $article->body }}
			</article>
		</div>
	</div>
		
@stop