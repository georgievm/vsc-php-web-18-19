@extends('layouts.app')
@section('title', 'Manage | Create city')

@section('content')
<div class="container single-panel">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-dark text-success">
                    <a href="{{ route('cities.index') }}" class="card-header-back"><</a>
                    {{__('auth.Add_city')}}
                </div>
                <div class="card-body bg-light">
                    {!! Form::open(['route' => ['cities.store']]) !!}
                    
                        <div class="form-group">
                            {!! Form::label('name', __('auth.City_name')) !!}
                            {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
                        </div>
                        @if($errors->has('name'))
                            <div class="alert alert-error alert-danger">
                                <ul>
                                    <li>{{ $errors->first('name') }}</li>
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