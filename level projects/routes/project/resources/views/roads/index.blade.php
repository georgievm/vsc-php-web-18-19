@extends('layouts.app')

@section('title', 'Manage | Roads')

@section('content')
	<div class="main-text crud-heading">{{__('auth.Roads')}}</div>
	@if (Session::has('message'))
		<div class="alert alert-success alert-fade col-md-9 mx-auto" role="alert">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			{!! Session::get('message') !!}
		</div>
	@endif
	<table class="table table-dark col-md-9 mx-auto text-center">
		<thead class="text-success font-weight-bold bg-dark">
			<tr>
				<th>{{__('auth.name')}}</th>
				<th>{{__('auth.City_A')}}</th>
				<th>{{__('auth.City_B')}}</th>
				<th>{{__('auth.Road_types')}}</th>
				<th>{{__('auth.Speed_limit')}}</th>
				<th>{{__('auth.Distance')}}</th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		@foreach($roads as $road)
			<tr>
				<td>
					<a class="text-white" href="{{ route('roads.show', $road->id) }}">
					{{ (App\Road::find($road->id))->id }}
				</td>
				<td>
					{{ (App\City::find($road->city_x_id))->name }}
				</td>
				<td>
					{{ (App\City::find($road->city_y_id))->name }}
				</td>
				<td>
					<a class="text-white" href="{{ route('road_types.show', $road->road_type_id) }}">
						<?php
						$road_type = App\RoadType::find($road->road_type_id);
						?>
						{{ $road_type->type }}
					</a>
				</td>
				<td>{{ $road->speed_limit }} km/h</td>
				<td>{{ $road->distance_km }} km</td>
				<td>
					<a href="{{ route('roads.edit', $road->id) }}" class="text-warning">{{__('auth.Update')}}</a>
				</td>
				<td>
					{!! Form::open(['route' => ['roads.destroy', $road->id], 'method' => 'DELETE']) !!}
						{!! Form::submit(__('auth.Delete'), ['class' => 'btn btn-link text-danger']) !!}
					{!! Form::close() !!}
				</td>
			</tr>
		@endforeach
	</table>
	<a href="{{ route('roads.create') }}" class="btn btn-big btn-success">{{__('auth.Create')}}</a>
@endsection