<nav style="box-shadow: 0 2px 3px #343a40;" class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand text-success font-weight-bold" href="{{ url('/') }}">
            <img class="navbar-logo" src="{{ asset('/images/logo.png') }}" width="34px" alt="app logo" draggable="false">
            {{ config('app.name', 'Travel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item {{ Request::is('home') ? 'active' : '' }}">

                    <a class="nav-link" href="{{ route('home') }}">@lang('home.home')</a>
                </li>
                <li class="nav-item {{ Request::is('about') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('about') }}">@lang('home.about_us')</a>
                </li>
                <li class="nav-item {{ Request::is('map') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('map') }}">@lang('home.map')</a>
                </li>
                
                @if (Auth::check() && Auth::user()->role == 'admin')
                <li class="nav-item dropdown {{ Request::is('cities') || Request::is('road_types') || Request::is('roads') || Request::is('gas_stations') ? 'active' : '' }}">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">@lang('home.manage')</a>

                    <div style="border: 1px solid #28a745;" class="dropdown-menu bg-dark no-padding">
                        <a class="dropdown-item text-white" href="{{ route('cities.index') }}">{{__('auth.Cities')}}</a>
                        <a class="dropdown-item text-white" href="{{ route('road_types.index') }}">{{__('auth.Road_Types')}}</a>
                        <a class="dropdown-item text-white" href="{{ route('roads.index') }}">{{__('auth.Roads')}}</a>
                        <a class="dropdown-item text-white" href="{{ route('gas_stations.index') }}">{{__('auth.Gas_Stations')}}</a>
                    </div>
                </li>
                @endif
<!--                 <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">  
                        {{ strtoupper (Config::get('app.locale')) }}
                    </a>
                    <div style="border: 1px solid #28a745;" class="dropdown-menu dropdown-flag bg-dark no-padding">
                        <a class="dropdown-item text-white" href="locale/en">
                            EN
                            <img class="flag" src="{{ asset('images/uk_flag.png') }}">
                        </a>
                        <a class="dropdown-item text-white" href="locale/fr">
                            FR
                            <img class="flag" src="{{ asset('images/fr_flag.png') }}">
                        </a>
                    </div>
                </li> -->
                {{-- Language --}}
            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a style="padding: 8px 16px 8px 16px !important;" class="nav-link text-white bg-success" href="{{ route('login') }}">{{ __('auth.login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link text-success " href="{{ route('register') }}">{{ __('auth.register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-success nav-link-no-effect" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div style="border: 1px solid #28a745;" class="dropdown-menu dropdown-menu-right bg-dark no-padding" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item text-white" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('auth.logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest

                <!-- Language -->
                <li class="nav-item nav-link">
                    <a class="btn-link lang-link text-success" href="locale/en">
                        <img src="{{ asset('images/uk_flag.png') }}" width="24px">
                    </a>
                    <span class="text-white"> | </span>
                    
                    <a class="btn-link lang-link text-success" href="locale/fr">
                        <img src="{{ asset('images/fr_flag.png') }}" width="24px">
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>