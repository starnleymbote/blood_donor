@extends('layouts.main')

@section('content')

<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header" style="text-align: center; background-color: tomato">Make An Appointment</div>
    
                    <div class="card-body">
                        <form method="POST" action="AppointmentController@store">
                            @csrf
    
                            <div class="form-group row">
                                <label for="center" class="col-md-3 col-form-label text-md-right">{{ __('Center Name :') }}</label>
    
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="center" value="{{ old('email') }}" required autocomplete="email" autofocus>
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                    <label for="app_date_label" class="col-md-3 col-form-label text-md-right">{{ __('Appointment Date :') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="app_date" type="email" class="form-control @error('email') is-invalid @enderror" name="app_date" value="{{ old('email') }}" required autocomplete="email" autofocus>
        
                                        @error('app_date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                        <label for="purpose_label" class="col-md-3 col-form-label text-md-right">{{ __('purpose :') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="purpose" type="email" class="form-control @error('email') is-invalid @enderror" name="purpose" value="{{ old('email') }}" required autocomplete="email" autofocus>
            
                                            @error('purpose')
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