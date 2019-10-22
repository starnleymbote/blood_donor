@extends('layouts.main')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header" style="text-align: center; background-color: tomato">Complete Registration</div>

                <div class="card-body">
                        {!! Form::open(['action' => 'Controller@store', 'method' => 'POST']) !!}
                    {{-- <form method="POST" action="AppointmentController@store"> --}}
                        @csrf

                        <div class="form-group row">
                            <label for="county_label" class="col-md-3 col-form-label text-md-right">{{ __('County :') }}</label>

                            <div class="col-md-8">
                                <input id="county" type="text" class="form-control @error('county') is-invalid @enderror" name="county" value="{{ old('county') }}" required autofocus>

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
                                    <input id="sub_county" type="text" class="form-control @error('sub_county') is-invalid @enderror" name="sub_county" value="{{ old('sub_county') }}" required autocomplete="email" autofocus>
    
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
                                    <input id="center" type="text" class="form-control @error('center') is-invalid @enderror" name="center" value="{{ old('center') }}" required autofocus>
    
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
                                    <input id="gender" type="text" class="form-control @error('gender') is-invalid @enderror" name="gender" value="{{ old('gender') }}" required autofocus>
    
                                    @error('gender')
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

                                            {{ __('Book Appointment') }}

                                        </button>
    
                                    </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
