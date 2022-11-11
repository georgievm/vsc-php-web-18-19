@extends('layouts.app')
@section('title', 'Manage | Road type Info')

@section('content')
<div class="container single-panel">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-dark text-success">
                    <a href="{{ route('road_types.index') }}" class="card-header-back"><</a>
                    {{__('auth.Road_type_Info')}}
                </div>
                <div class="card-body bg-light">
                    <div class="info-row col-md-10">
                        <div class="info-name">{{__('auth.Type')}}</div>
                        <div class="info-value">{{ $road_type->type }}</div>
                    </div>
                    <div class="info-row col-md-10">
                        <div class="info-name">{{__('auth.Delay_factor')}}</div>
                        <div class="info-value">{{ $road_type->delay_factor }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection