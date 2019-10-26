@extends('layouts.main')

@section('content')

<div class="container">
        <div class="row justify-content-center">

            <div class="col-md-10">

                    @if (Session::has('success'))
                        <div class="alert alert-success" role="alertdialog">
                            {{Session::get('success')}}
                        </div>
                    @endif

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
                    <div class="card-header" style="text-align: center; background-color: tomato">Make An Appointment</div>
    
                    <div class="card-body">
                        {!! Form::open(['action' => 'AppointmentController@store','method' => 'POST']) !!}
                        {{-- <form method="POST" action="AppointmentController@store"> --}}
                            @csrf
    
                            <div class="form-group row">
                                <label for="center_label" class="col-md-3 col-form-label text-md-right">{{ __('Center Name :') }}</label>
    
                                <div class="col-md-6">
                                    @php
                                        $donation_center = $centre ->pluck('name','id')->toArray();
                                    @endphp
                                    {{ Form::select('center', $donation_center, 'select a center', ['class'=>"form-control",'placeholder' => 'Donation Center']) }}
                                    {{-- <input id="center" type="email" class="form-control @error('email') is-invalid @enderror" name="center" value="{{ old('email') }}" required autocomplete="email" autofocus> --}}
    
                                    @error('center')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                    <label for="app_date_label" class="col-md-3 col-form-label text-md-right">{{ __('Appointment Date :') }}</label>
        
                                    <div class="col-md-6">
                                        {!! Form::date('app_date', \Carbon\Carbon::now(),['class' => 'form-control'])!!}
        
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
                                            {!! Form::textarea('purpose', '', ['class' =>'form-control','placeholder' => 'Enter a purpose']) !!}
            
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
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection