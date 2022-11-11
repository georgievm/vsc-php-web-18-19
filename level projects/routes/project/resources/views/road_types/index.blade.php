@extends('layouts.app')

@section('title', 'Manage | Road types')

@section('content')
	<div class="main-text crud-heading">{{__('auth.Road_types')}}</div>
	@if (Session::has('message'))
		<div class="alert alert-success alert-fade col-md-8 mx-auto" role="alert">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			{!! Session::get('message') !!}
		</div>
	@endif
	<table class="table table-dark col-md-8 mx-auto text-center">
		<thead class="text-success font-weight-bold bg-dark">
			<tr>
				<th>{{__('auth.Type')}}</th>
				<th>{{__('auth.Delay_factor')}}</th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		@foreach($road_types as $road_type)
			<tr>
				<td>
					<a class="text-white" href="{{ route('road_types.show', $road_type->id) }}">{{ $road_type->type }}</a>
				</td>
				<td>
					{{ $road_type->delay_factor }}
				</td>	
				<td>
					<a href="{{ route('road_types.edit', $road_type->id) }}" class="text-warning">{{__('auth.Update')}}</a>
				</td>
				<td>
					{!! Form::open(['route' => ['road_types.destroy', $road_type->id], 'method' => 'DELETE']) !!}
						{!! Form::submit(__('auth.Delete'), ['class' => 'btn btn-link text-danger']) !!}
					{!! Form::close() !!}
				</td>
			</tr>
		@endforeach
	</table>
	<a href="{{ route('road_types.create') }}" class="btn btn-big btn-success">{{__('auth.Create')}}</a>
@endsection