@extends('layouts.app')
@section('title', 'Travel | Verify Email')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('auth.Verify_Your_Email_Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('auth.fresh') }}
                        </div>
                    @endif

                    {{ __('auth.proceeding') }}
                    {{ __('auth.receive') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('auth.request') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
