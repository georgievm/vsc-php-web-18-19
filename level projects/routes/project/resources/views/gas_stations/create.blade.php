@extends('layouts.app')
@section('title', 'Manage | Create gas station')

@section('content')
<div class="container single-panel">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-dark text-success">
                    <a href="{{ route('gas_stations.index') }}" class="card-header-back"><</a>
                    {{__('auth.Add_gas_station')}}
                </div>
                <div class="card-body bg-light">
                    {!! Form::open(['route' => ['gas_stations.store']]) !!}
                        <div class="row">
                            <div class="form-group col-md-6">
                                {!! Form::label('name', __('auth.name')) !!}
                                {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}

                                @if($errors->has('name'))
                                    <span class="text-danger float-right">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                {!! Form::label('city_id', __('auth.City')) !!}
                                {!! Form::select('city_id', $cities_arr, old('city_id'), ['class' => 'form-control']) !!}

                                @if($errors->has('name'))
                                    <span class="text-danger float-right">{{ $errors->first('city_id') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                {!! Form::label('road_id', __('auth.Road')) !!}
                                {!! Form::select('road_id', $roads_arr, null, ['class' => 'form-control', 'placeholder' => 'none']) !!}

                                @if($errors->has('name'))
                                    <span class="text-danger float-right">{{ $errors->first('road_id') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                {!! Form::label('distance_to_city', __('auth.Distance_to_the_city')) !!}
                                {!! Form::number('distance_to_city', old('distance_to_city'), ['class' => 'form-control', 'placeholder' => 'none']) !!}

                                @if($errors->has('name'))
                                    <span class="text-danger float-right">{{ $errors->first('distance_to_city') }}</span>
                                @endif
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="form-group col-md-4">
                                {!! Form::label('diesel', __('auth.Diesel_price')) !!}
                                {!! Form::text('diesel', old('diesel'), ['class' => 'form-control', 'placeholder' => 'none']) !!}

                                @if($errors->has('name'))
                                    <span class="text-danger float-right">{{ $errors->first('diesel') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                {!! Form::label('gasoline', __('auth.Gasoline_price')) !!}
                                {!! Form::text('gasoline', old('gasoline'), ['class' => 'form-control', 'placeholder' => 'none']) !!}

                                @if($errors->has('name'))
                                    <span class="text-danger float-right">{{ $errors->first('gasoline') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                {!! Form::label('gas', __('auth.Gas_price')) !!}
                                {!! Form::text('gas', old('gas'), ['class' => 'form-control', 'placeholder' => 'none']) !!}

                                @if($errors->has('name'))
                                    <span class="text-danger float-right">{{ $errors->first('gas') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                {!! Form::label('methane', __('auth.Methane_price')) !!}
                                {!! Form::text('methane', old('methane'), ['class' => 'form-control', 'placeholder' => 'none']) !!}

                                @if($errors->has('name'))
                                    <span class="text-danger float-right">{{ $errors->first('methane') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                {!! Form::label('electricity', __('auth.Electricity_price')) !!}
                                {!! Form::text('electricity', old('electricity'), ['class' => 'form-control', 'placeholder' => 'none']) !!}

                                @if($errors->has('name'))
                                    <span class="text-danger float-right">{{ $errors->first('electricity') }}</span>
                                @endif
                            </div>
                        </div>
                        {!! Form::submit(__('auth.Create'), ['class' => 'btn btn-normal btn-success float-right']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection