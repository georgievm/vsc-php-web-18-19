@extends('layouts.app')
@section('title', 'Travel | About us')

@section('content')
    <div class="container">
        <div class="main-text">
            <span class="green_underlined">
                {{__('auth.About_us')}}
            </span>
        </div>
        <div class="about-text col-lg-9 mx-auto">
            Sit voluptate esse consectetur in dolor id ullamco ad nostrud consectetur enim excepteur ut sunt in exercitation sed anim excepteur pariatur minim duis occaecat aute ut ut deserunt esse qui non eu velit ad laboris amet id est veniam est pariatur ea laboris est occaecat sed amet esse ad nisi do dolor veniam occaecat et elit dolor sit adipisicing sunt consectetur dolore velit consequat officia aute deserunt consectetur enim laboris reprehenderit consequat ut aliquip et et laboris ea consequat quis dolor qui laboris laboris pariatur voluptate proident nostrud aliqua consequat anim minim culpa ad sint enim incididunt aliquip do laborum.
        </div>
        <div class="col-lg-6 nopadding d-inline-block float-left">
            <div class="about-name">
                KvotheBG
            </div>
            <img class="about-img" src="{{ asset('images/kiril.jpg') }}" title="Kiril Damqnovski" alt="pic" draggable="false">
        </div>
        <div class="col-lg-6 nopadding d-inline-block">
            <div class="about-name">
                Martin G
            </div>
            <img class="about-img" src="{{ asset('images/martin.jpg') }}" title="Martin Georgiev" alt="pic" draggable="false">
        </div>
    </div>
@endsection
