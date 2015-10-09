@extends('app')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<h1 class="page-header">[Edit] {{ $article->title }}<a href="{{ url('admin/article') }}" class="btn btn-info pull-right">Go Back To Article List</a></h1>
			<p class="lead">Edit this article below.</p>

			@include('partials.alerts.errors')

			@if(Session::has('flash_message'))
				<div class="alert alert-success">
				{{ Session::get('flash_message') }}
				</div>
			@endif

			{!! Form::model($article, [
				'method' => 'PUT',
				'route' => ['admin.update', $article->id]
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
		</div>
	</div>
@stop
