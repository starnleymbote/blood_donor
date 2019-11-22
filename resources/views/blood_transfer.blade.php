@extends('layouts.main')

@section('content')

<div class="row container-fluid">

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
            <div class="card-header" style="text-align: center; background-color: tomato">Inter Center Blood Transfer</div>

            <div class="card-body">
                {!! Form::open(['action' => 'BloodBankController@request_transfer','method' => 'POST']) !!}
                {{-- <form method="POST" action="AppointmentController@store"> --}}
                    @csrf

                    <div class="form-group row">
                        <label for="center_label" class="col-md-3 col-form-label text-md-right">{{ __('Center Requesting  :') }}</label>

                        <div class="col-md-6">
                            @php
                                $donation_center = $get_donation_center->pluck('name','id')->toArray();
                            @endphp
                            {{ Form::select('center_requesting', $donation_center, $donation_center, ['class'=>"form-control",'readonly']) }}
                            {{-- <input id="center" type="email" class="form-control @error('email') is-invalid @enderror" name="center" value="{{ old('email') }}" required autocomplete="email" autofocus> --}}

                            @error('center')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="center_label" class="col-md-3 col-form-label text-md-right">{{ __('Center Requesting from :') }}</label>

                        <div class="col-md-6">
                            @php
                                $requesting_from = $other_centers->pluck('name','id')->toArray();
                            @endphp
                            {{ Form::select('center_requesting_from', $requesting_from, '', ['class'=>"form-control",'placeholder' => 'Request supply from']) }}
                            {{-- <input id="center" type="email" class="form-control @error('email') is-invalid @enderror" name="center" value="{{ old('email') }}" required autocomplete="email" autofocus> --}}

                            @error('center')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                            <label for="amount" class="col-md-3 col-form-label text-md-right">{{ __('Requesting Amount :') }}</label>

                            <div class="col-md-6">
                                {!! Form::number('amount',"", ['class' => 'form-control','placeholder' => 'pint requesting'])!!}

                                @error('app_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Request Supply') }}
                                    </button>

                                </div>
                        </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
        
@endsection