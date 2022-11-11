@extends('layouts.app')

@section('title', 'Manage | Cities')

@section('content')
	<div class="main-text crud-heading">{{__('auth.Cities')}}</div>
	@if (Session::has('message'))
		<div class="alert alert-success alert-fade col-md-7 mx-auto" role="alert">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			{!! Session::get('message') !!}
		</div>
	@endif
	<table class="table table-dark col-md-7 mx-auto text-center">
		<thead class="text-success font-weight-bold bg-dark">
			<tr>
				<th>{{__('auth.name')}}</th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		@foreach($cities as $city)
			<tr>
				<td>
					<a href="{{ route('cities.show', $city->id) }}" class="text-white">
						{{ $city->name }}
					</a>
				</td>	
				<td>
					<a href="{{ route('cities.edit', $city->id) }}" class="text-warning">{{__('auth.Update')}}</a>
				</td>
				<td>
					{!! Form::open(['route' => ['cities.destroy', $city->id], 'method' => 'DELETE']) !!}
						{!! Form::submit(__('auth.Delete'), ['class' => 'btn btn-link text-danger']) !!}
					{!! Form::close() !!}
				</td>
			</tr>
		@endforeach
	</table>
	<a href="{{ route('cities.create') }}" class="btn btn-big btn-success">{{__('auth.Create')}}</a>
@endsection