@extends('layouts.app')

@section('title', 'Manage | Gas Stations')

@section('content')
	<div class="main-text crud-heading">{{__('auth.Gas_Stations')}}</div>
	@if (Session::has('message'))
		<div class="alert alert-success alert-fade col-md-10 mx-auto" role="alert">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			{!! Session::get('message') !!}
		</div>
	@endif
	<table class="table table-dark col-md-10 mx-auto text-center">
		<tr class="text-success font-weight-bold bg-dark">
			<th>{{__('auth.name')}}</th>
			<th>{{__('auth.City')}}</th>
			<th>{{__('auth.Road')}}</th>
			<th>{{__('auth.Distance_to_the_city')}}</th>
			<th>{{__('auth.Diesel')}}</th>
			<th>{{__('auth.Gasoline')}}</th>
			<th>{{__('auth.Gas')}}</th>
			<th>{{__('auth.Methane')}}</th>
			<th>{{__('auth.Electricity')}}</th>
			<th></th>
			<th></th>
		</tr>
		@foreach($gas_stations as $gas_station)
			<tr>
				<td>
					<a href="{{ route('gas_stations.show', $gas_station->id) }}" class="text-white">
					{{ $gas_station->name }}
				</td>
				<td>
					{{ $gas_station->city->name }}
				</td>
				<td>
					{{ $gas_station->road_id }}
				</td>
				<td>
					@if ($gas_station->distance_to_the_city)
						{{ $gas_station->distance_to_the_city }} km
					@endif
				</td>
				<td>
					{{ $gas_station->diesel_price }}
				</td>
				<td>
					{{ $gas_station->gasoline_price }}
				</td>
				<td>
					{{ $gas_station->gas_price }}
				</td>
				<td>
					{{ $gas_station->metan_price }}
				</td>
				<td>
					{{ $gas_station->electricity_price }}
				</td>
				<td>
					<a href="{{ route('gas_stations.edit', $gas_station->id) }}" class="text-warning">{{__('auth.Update')}}</a>
				</td>
				<td>
					{!! Form::open(['route' => ['gas_stations.destroy', $gas_station->id], 'method' => 'DELETE']) !!}
						{!! Form::submit(__('auth.Delete'), ['class' => 'btn btn-link text-danger']) !!}
					{!! Form::close() !!}
				</td>
			</tr>
		@endforeach
	</table>
	<a href="{{ route('gas_stations.create') }}" class="btn btn-big btn-success">{{__('auth.Create')}}</a>
@endsection