@extends('layouts.app')
@section('title', 'Travel | Home')

@section('content')
    <div class="container">
        <div class="main-text">@lang('auth.Find_out')<br>{{ __('auth.how_long_your_trip_will_take.') }}</div>
        <div style="margin-bottom: 10px;" class="row">
        	<div class="col-lg-12">
        <div class="row mar-bott">
        	<div class="
                <?php if(App::isLocale('en')) {
                    echo 'col-lg-7';
                } else {
                    echo 'col-lg-6';
                } ?>">
                <?php
                if (App::isLocale('en')) {
                    ?>
                    <img class="home-img col-lg-12" src="{{ asset('images/map_preview.png') }}" draggable="false">
                <?php
                }?>
                <?php
                if (App::isLocale('fr')) {
                    ?>
                    <img class="home-img col-lg-12" src="{{ asset('images/map_preview_fr.png') }}" draggable="false">
                <?php
                }?>
	        </div>
	        <div class="
                <?php if (App::isLocale('en')) {
                    echo 'col-lg-5';
                } else {
                    echo 'col-lg-6';
                } ?>">
        		<ul class="text-white home-ul">
        			<li>
        				<img src="{{ asset('images/1.png') }}" draggable="false">
        				{{__('auth.Select_start_town')}}
        			</li>
        			<li>
        				<img src="{{ asset('images/2.png') }}" draggable="false">
        				{{__('auth.Select_end_town')}}
        			</li>
        			<li>
        				<img src="{{ asset('images/3.png') }}" draggable="false">
        				{{__('auth.Press_the_button')}}
        			</li>
        		</ul>
        	</div>
        </div>
		<div class="main-text">{{__("auth.It's_so_simple!")}}</div>
        <a class="btn btn-lg btn-success btn-try-it" href="{{ route('map') }}">{{__('auth.Try_it_now')}}</a>
    </div>
@endsection