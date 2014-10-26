@extends('admin.template')

@section('header')
    Info
@stop

@section('small')
    information about You and your company
@stop

@section('content')

	<div class="col-sm-10 col-md-10 col-lg-8"> 

		{!! Form::open([ 'url' => 'admin/page/create']) !!}

			{!! Form::submit('Create page', [ 'class' => 'btn btn-lg btn-primary pull-right']) !!}

			<div class="clearfix"></div>

			<br><br>

			<h3>{!! Form::label('name', 'Name') !!}</h3>
			{!! Form::text('name', '', [ 'class' => 'form-control' ]) !!}

			<h3>{!! Form::label('content', 'Page content') !!}</h3>
			{!! Form::textarea('content', '', [ 'class' => 'form-control', 'rows' => 10 ]) !!}

		{!! Form::close() !!}

	</div>

@stop