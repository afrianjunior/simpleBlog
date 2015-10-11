@extends('app')

@section('content')
	<div class="row">
		<div class="col-md-12">
				<h1 class="page-header">Write A New Article</h1>
				
				@include('partials.alerts.errors')

				{!! Form::open(['url' => 'admin/article']) !!}
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

				@if(Session::has('flash_message'))
					<div class="alert alert-success">
						{{ Session::get('flash_message') }}
					</div>
				@endif
		</div>
	</div>
@stop
