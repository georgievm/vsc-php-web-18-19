@extends('layouts.app')
@section('title', 'Manage | Edit road')

@section('content')
<div class="container single-panel">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-dark text-success">
                    <a href="{{ route('roads.index') }}" class="card-header-back"><</a>
                    {{__('auth.Edit_road')}}
                </div>
                <div class="card-body bg-light">
                    {!! Form::model($road, ['method' => 'PUT', 'route' => ['roads.update', $road->id]]) !!}
                        <div class="form-group">
                            {!! Form::label('city_x_id', __('auth.City_A')) !!}
                            {!! Form::select('city_x_id', $cities_arr, $road->city_x_id, ['class' => 'form-control']) !!}
                        </div>
                        @if($errors->has('city_x_id'))
                            <div class="alert alert-error alert-danger">
                                <ul>
                                    <li>{{ $errors->first('city_x_id') }}</li>
                                </ul>
                            </div>
                        @endif

                        <div class="form-group">
                            {!! Form::label('city_y_id', __('auth.City_B')) !!}
                            {!! Form::select('city_y_id', $cities_arr, $road->city_y_id, ['class' => 'form-control']) !!}
                        </div>
                        @if($errors->has('city_y_id'))
                            <div class="alert alert-error alert-danger">
                                <ul>
                                    <li>{{ $errors->first('city_y_id') }}</li>
                                </ul>
                            </div>
                        @endif

                        <div class="form-group">
                            {!! Form::label('road_type_id', __('auth.Road_type')) !!}
                            {!! Form::select('road_type_id', $road_types_arr, $road->road_type_id, ['class' => 'form-control']) !!}
                        </div>
                        @if($errors->has('road_type_id'))
                            <div class="alert alert-error alert-danger">
                                <ul>
                                    <li>{{ $errors->first('road_type_id') }}</li>
                                </ul>
                            </div>
                        @endif

                        <div class="form-group">
                            {!! Form::label('speed_limit', __('auth.Speed_limit')) !!}
                            {!! Form::number('speed_limit', $road->speed_limit, ['class' => 'form-control']) !!}
                        </div>
                        @if($errors->has('speed_limit'))
                            <div class="alert alert-error alert-danger">
                                <ul>
                                    <li>{{ $errors->first('speed_limit') }}</li>
                                </ul>
                            </div>
                        @endif

                        <div class="form-group">
                            {!! Form::label('distance', __('auth.Distance')) !!}
                            {!! Form::number('distance', $road->distance_km, ['class' => 'form-control']) !!}
                        </div>
                        @if($errors->has('distance'))
                            <div class="alert alert-error alert-danger">
                                <ul>
                                    <li>{{ $errors->first('distance') }}</li>
                                </ul>
                            </div>
                        @endif

                        {!! Form::submit(__('auth.Edit'), ['class' => 'btn btn-normal btn-success float-right']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection