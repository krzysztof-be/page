@extends('admin.template')

@section('header')
    Info
@stop

@section('small')
    information about You and your company
@stop

@section('content')

	<div class="col-sm-10 col-md-10 col-lg-8"> 

		<table class="table table-striped">
			<thead>
				<th>#</th>
				<th>Slug</th>
				<th>Name</th>
			</thead>
			<tbody>
				@foreach($pages as $page)
				<tr>
					<td>{{ $page->id }}</td>
					<td>{{ $page->slug }}</td>
					<td>{{ $page->name }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>

	</div>

@stop