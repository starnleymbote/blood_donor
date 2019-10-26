@extends('layouts.main')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            <div class="card">
                <div class="card-header" style="text-align: center; background-color: tomato">Complete Registration</div>

                <div class="card-body">
                        {!! Form::open(['action' => 'DonorDetailsController@store', 'method' => 'POST','enctype'=>'multipart/form-data']) !!}
                    {{-- <form method="POST" action="AppointmentController@store"> --}}
                            
                        @csrf

                        <div class="form-group row">
                            <label for="county_label" class="col-md-3 col-form-label text-md-right">{{ __('County :') }}</label>

                            <div class="col-md-8">
                                @php
                                    $county = $counties->pluck('name','id')->toArray();
                                @endphp
                                {{ Form::select('county', $county, null, ['class'=>"form-control",'placeholder' => 'select your county']) }}
                                {{-- <input id="county" type="text" class="form-control @error('county') is-invalid @enderror" name="county" value="{{ old('county') }}" required autofocus> --}}

                                @error('county')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                                <label for="sub_county_label" class="col-md-3 col-form-label text-md-right">{{ __('Sub County :') }}</label>
    
                                <div class="col-md-8">
                                    @php
                                        $sub = $sub_counties ->pluck('name','id')->toArray();
                                    @endphp
                                    {{ Form::select('sub_county', $sub, 'select your sub county', ['class'=>"form-control",'placeholder' => 'select your sub county']) }}
                                    {{-- <input id="sub_county" type="text" class="form-control @error('sub_county') is-invalid @enderror" name="sub_county" value="{{ old('sub_county') }}" required autocomplete="email" autofocus> --}}
    
                                    @error('sub_county')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                        </div>

                        <div class="form-group row">
                                <label for="center_label" class="col-md-3 col-form-label text-md-right">{{ __('Center Name :') }}</label>
    
                                <div class="col-md-8">
                                   @php
                                        $donation_center = $center ->pluck('name','id')->toArray();
                                    @endphp
                                    {{ Form::select('center', $donation_center, 'select a center', ['class'=>"form-control",'placeholder' => 'Donation Center']) }}
                                    {{-- <input id="center" type="text" class="form-control @error('center') is-invalid @enderror" name="center" value="{{ old('center') }}" required autofocus> --}}
    
                                    @error('center')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                        </div>

                        <div class="form-group row">
                                <label for="phone_label" class="col-md-3 col-form-label text-md-right">{{ __('Phone Number :') }}</label>
    
                                <div class="col-md-8">
                                    <input id="phone" type="number" class="form-control @error('email') is-invalid @enderror" name="phone" value="{{ old('email') }}" required autofocus>
    
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                        </div>

                        <div class="form-group row">
                                <label for="gender_label" class="col-md-3 col-form-label text-md-right">{{ __('Gender :') }}</label>
    
                                <div class="col-md-8">
                                    {{-- <input id="gender" type="text" class="form-control @error('gender') is-invalid @enderror" name="gender" value="{{ old('gender') }}" required autofocus> --}}
                                    {{ Form::select('gender', ['male' => 'Male','female' => 'Female'], null, ['class'=>"form-control",'placeholder' => 'Select Gender']) }}
                                    
                                    @error('gender')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                        </div>

                        <div class="form-group row">
                                <label for="blood_group_label" class="col-md-3 col-form-label text-md-right">{{ __('Blood Group :') }}</label>
    
                                <div class="col-md-8">
                                        @php
                                        $group = $blood_group ->pluck('name','id')->toArray();
                                    @endphp
                                    {{ Form::select('blood_group', $group, null, ['class'=>"form-control",'placeholder' => 'Blood Group']) }}
                                    {{-- <input id="blood_group" type="text" class="form-control @error('blood_group') is-invalid @enderror" name="blood_group" value="{{ old('gender') }}" required autofocus>
     --}}
                                    @error('blood_group')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                        </div>

                        
                        <div class="form-group row">
                                <label for="User_profile_label" class="col-md-3 col-form-label text-md-right">{{ __('Profile Picture :') }}</label>
    
                                <div class="col-md-8">
                                    <input id="profile" type="file" class="form-control @error('profile') is-invalid @enderror" name="profile" value="{{ old('profile') }}" required autofocus>
    
                                    @error('profile')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                        </div>


                        <div class="form-group row mb-0">

                                    <div class="col-md-8 offset-md-4">

                                        <button type="submit" class="btn btn-primary">

                                            {{ __('Complete Registration') }}

                                        </button>
    
                                    </div>
                        </div>

                        {!! Form::close() !!}
                    {{-- </form> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
