@extends('layouts.main')

@section('content')
    @forelse ($donor_details as $profile)
    
    <div class="row">

        <div class="col-md-4">

                {{-- <img src="{{ asset('public/storage/users_avatar/{!!$profile ->donor_details ->avatar!!} ') }}" alt="Image supposed to be here" style="width: 100%; height: 180px"> --}}

        <img src="/storage/images/{{$profile ->donor_details ->avatar}}" alt="Image supposed to be here" style="width: 100%; height: 180px">

        </div>

        <div class="col-md-8">

            <ul class="list-group" style="width: 80%; height: 200px;">

                <li class="list-group-item">
                   <b> Name : </b> <b style="color: blue"> {{$profile->name}} </b>
                </li>

                <li class="list-group-item">
                   <b> Gender : </b> <b style="color: blue"> {{$profile ->donor_details ->gender}} </b>
                </li>

                <li class="list-group-item">
                    <b> Blood Group : </b> <b style="color: red"> {{$profile ->donor_details ->blood_group->name}} </b>
                </li>

            </ul>

        </div>

    </div>

    <div class="row justify-content-center">
        
        <ul class="list-group" style="width: 90%; padding-left: 1%">
                <br/><br/>

            <li class="list-group-item">
                <b> Phone : </b> <b style="color: blue"> 0{{$profile ->donor_details ->phone}} </b>
            </li>

            <li class="list-group-item">
                <b> Email Address : </b> <b style="color: blue"> {{$profile ->email}} </b>
            </li>

            <li class="list-group-item">
                @foreach ($county as $name)
                <b> County : </b> <b style="color: blue"> {{$name->name}} </b>    
                @endforeach
                
            </li>

            <li class="list-group-item">
                    @foreach ($sub_county as $name)
                    <b> Sub County : </b> <b style="color: blue"> {{$name->name}} </b>    
                    @endforeach
                
            </li>

            <li class="list-group-item">
                @forelse ($donor_center as $center)
                    <b> Main Donation Center : </b> <b style="color: blue">{{$center ->donation_center ->name}},</b>

                    @foreach ($sub_county as $name)
                        <b style="color: blue"> {{$name->name}} </b>    
                    @endforeach
                @empty

                    
                @endforelse
                
            </li>
    
    
        </ul>
    </div>

    @empty
        
    @endforelse
@endsection