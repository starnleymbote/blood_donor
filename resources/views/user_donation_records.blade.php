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
            <div class="card-header" style="text-align: center; background-color: tomato">Donor Donation Records</div>

            <div class="card-body">
                {!! Form::open(['action' => 'DonorRecordsController@donation_records','method' => 'POST']) !!}
                {{-- <form method="POST" action="AppointmentController@store"> --}}
                    @csrf

                    <div class="form-group row">
                            <label for="email" class="col-md-3 col-form-label text-md-right">{{ __('Donor E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                    </div>


                    <div class="form-group row">
                        <label for="center_label" class="col-md-3 col-form-label text-md-right">{{ __('Donated at :') }}</label>

                        <div class="col-md-6">
                            @php
                                $dcenter = $donation_center->pluck('name','id')->toArray();
                            @endphp
                            {{ Form::select('donated_at', $dcenter, "", ['class'=>"form-control",'placeholder' => 'Donating at :']) }}
                            {{-- <input id="center" type="email" class="form-control @error('email') is-invalid @enderror" name="center" value="{{ old('email') }}" required autocomplete="email" autofocus> --}}

                            @error('center')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                            <label for="pint" class="col-md-3 col-form-label text-md-right">{{ __('Donated Pints:') }}</label>

                            <div class="col-md-6">
                                
                                <input id="pint" type="number" class="form-control @error('pint') is-invalid @enderror" name="pint" value="1" autofocus>

                                @error('pint')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                    </div>


                    <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Add recotd') }}
                                </button>

                            </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
        
@endsection