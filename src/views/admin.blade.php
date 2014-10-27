@extends('admin.template')

@section('header')
    Info
@stop

@section('small')
    information about You and your company
@stop

@section('content')

	<div class=""> 

		<a href="{{ url('admin/page/create') }}" class="btn btn-lg btn-primary pull-right">
			Create new page
		</a>

		<table class="table table-striped">
			<thead>
				<th>#</th>
				<th>Slug</th>
				<th>Name</th>
				<th>
			</thead>
			<tbody>
				@if(count($pages))
				@foreach($pages as $page)
				<tr>
					<td>{{ $page->id }}</td>
					<td>{{ $page->slug }}</td>
					<td>{{ $page->name }}</td>
					<td>
						<a href="{{ url('admin/page/' . $page->slug . '/edit') }}" class="btn btn-sm btn-danger">edit</a>
					</td>
				</tr>
				@endforeach
				@else
					<p class="text-muted">No pages found.</p>
				@endif
			</tbody>
		</table>

	</div>

@stop