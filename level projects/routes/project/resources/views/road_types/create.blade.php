@extends('layouts.app')
@section('title', 'Manage | Create road type')

@section('content')
<div class="container single-panel">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-dark text-success">
                    <a href="{{ route('road_types.index') }}" class="card-header-back"><</a>
                    {{__('auth.Add_road_type')}}
                </div>
                <div class="card-body bg-light">
                    {!! Form::open(['route' => ['road_types.store']]) !!}
                        <div class="form-group">
                            {!! Form::label('type', __('auth.Add_road_type')) !!}
                            {!! Form::text('type', old('type'), ['class' => 'form-control']) !!}
                        </div>
                        @if($errors->has('type'))
                            <div class="alert alert-error alert-danger">
                                <ul>
                                    <li>{{ $errors->first('type') }}</li>
                                </ul>
                            </div>
                        @endif

                        <div class="form-group">
                            {!! Form::label('delay_factor', __('auth.Delay_factor')) !!}
                            {!! Form::text('delay_factor', old('delay_factor'), ['class' => 'form-control']) !!}
                        </div>
                        @if($errors->has('delay_factor'))
                            <div class="alert alert-error alert-danger">
                                <ul>
                                    <li>{{ $errors->first('delay_factor') }}</li>
                                </ul>
                            </div>
                        @endif

                        {!! Form::submit(__('auth.Create'), ['class' => 'btn btn-normal btn-success float-right']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection