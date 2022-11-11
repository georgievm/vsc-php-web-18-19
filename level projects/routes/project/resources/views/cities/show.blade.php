@extends('layouts.app')
@section('title', 'Manage | City Info')

@section('content')
<div class="container single-panel">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-dark text-success">
                    <a href="{{ route('cities.index') }}" class="card-header-back"><</a>
                    {{__('auth.City_info')}}
                </div>
                <div class="card-body bg-light">
                    <div class="info-row col-md-10">
                        <div class="info-name">{{__('auth.name')}}</div>
                        <div class="info-value">{{ $city->name }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection