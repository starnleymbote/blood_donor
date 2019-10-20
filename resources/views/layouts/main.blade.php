@extends('layouts.app')
<link rel="stylesheet" href="css/owl.carousel.css" type="text/css" media="all">
	<link rel="stylesheet" href="css/owl.theme.css" type="text/css" media="all">
	<!-- css files -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" /> <!-- Style-CSS --> 
	<link rel="stylesheet" href="css/fontawesome-all.css"> 
	<!-- //css files -->

@section('content')
<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-4">
            <ul class="list-group">

                    <li class="list-group-item">

                        <a href="">Complete Registration</a>
        
                    </li>
                
                <li class="list-group-item">

                    <a href="">User Profile</a>

                </li>

                <li class="list-group-item">

                    <a href="">Make An Appointment</a>

                </li>

                <li class="list-group-item">

                     <a href="">Check Records</a>

                </li>

            </ul>
        </div>

        <div class="col-md-8">

            @yield('data')
        
        </div>
        
    </div>
    
</div>
@endsection
