<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
    <title>Blood Donor</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{-- {{ config('app.name', 'Laravel') }} --}}
                    Blood Donor
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">

        @if (Auth::check() )
            
            <div class="row justify-content-center">

                <div class="col-md-4" style="padding-left: 5%">

                        <ul class="list-group">

                                @if (Auth::User()->role_id == 1)
                                <li class="list-group-item">

                                        <a href="/user_index">Home</a>

                                    </li>

                                    <li class="list-group-item">
                    
                                        <a href="/donor_details">Complete Registration</a>
                            
                                    </li>
                                    
                                    <li class="list-group-item">
                    
                                    <a href="/user_profile/{{Auth::user()->id}}">User Profile</a>
                    
                                    </li>
                    
                                    <li class="list-group-item">
                    
                                        <a href="/appointments">Make An Appointment</a>
                    
                                    </li>
                    
                                    {{-- <li class="list-group-item">
                    
                                        <a href="/chech_records">Check Records</a>
                    
                                    </li>
                                     --}}
                                        
                            @endif

                            {{-- ADMINS PANEL --}}
                            @if (Auth::User()->role_id == 3)
                                
                                    
                                    <li class="list-group-item">
                    
                                            <a href="/allusers">List All Donors</a>
                    
                                    </li>

                                    <li class="list-group-item">
                    
                                            <a href="/listappointments">Check Appointments</a>
                    
                                    </li>

                                    <li class="list-group-item">
                    
                                        <a href="/newcenter">Add Donation Center</a>
                
                                    </li>

                                    <li class="list-group-item">
                    
                                            <a href="/center_list">List Donation Center</a>
                    
                                    </li>

                                    <li class="list-group-item">
                    
                                            <a href="/add_county">Add a County</a>
                    
                                    </li>

                                    <li class="list-group-item">
                    
                                        <a href="/add_sub_county">Add A Sub County</a>
                
                                        </li>

{{-- 
                                    <li class="list-group-item">
                    
                                            <a href="">Blood Level Per County</a>
                    
                                    </li> --}}

                                    <li class="list-group-item">
                    
                                            <a href="/new_admin">Add New Admin</a>
                    
                                    </li>

                               @endif

                               @if (Auth::User()->role_id == 2)


                               <li class="list-group-item">
                    
                                    <a href="/center_donor_list">List All Donors</a>
    
                                </li>

                               <li class="list-group-item">
                    
                                    <a href="/center_blood_level">Check Blood Level</a>
        
                                </li>

                                <li class="list-group-item">
                    
                                    <a href="/specific_center_appointment">Check Appointments</a>
        
                                </li>

                                <li class="list-group-item">
                    
                                    <a href="/new_admin">Inter Center Blood Transfer</a>
        
                                </li>

                                   
                               @endif
            
                        </ul>

                </div>

                <div class="col-md-8">

                        @yield('content')

                </div>

                

            </div>

            @else
                {{ route('/login', ['']) }}
        @endif
            
        </main>
    </div>
</body>
</html>
