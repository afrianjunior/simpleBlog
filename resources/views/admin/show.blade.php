@extends('app')

@section('content')
<div class="row">
	<div class="col-md-12">
		<h1 class="page-header">[View] {{ $article->title }}</h1>

		<article>
			{{ $article->body }}
		</article>
		<hr>

		<a href="{{ url('admin/article') }}" class="btn btn-info">Back To Article List</a>
		<a href="{{ route('admin.edit', $article->id) }}" class="btn btn-warning">Edit Article</a>

		<div class="pull-right">
			{!! Form::open([
				'method' => 'DELETE',
				'route' => ['admin.destroy', $article->id]
			]); !!}

			{!!  Form::submit('Delete this article?', ['class' => 'btn btn-danger']) !!}
			{!!  Form::close() !!}
		</div>
	</div>
</div>
@stop