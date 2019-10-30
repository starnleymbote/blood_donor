@extends('layouts.main')

@section('content')

<div class="container">

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row justify-content-center">
            @if (Session::has('success'))
            <div class="alert alert-success" role="alertdialog">
                {{Session::get('success')}}
            </div>
        @endif
        <div class="col-md-10">
            <div class="card">
                <div class="card-header" style="background-color: tomato; text-align: center;">{{ __('Add A New Donation Center') }}</div>

                <div class="card-body">
                    {!! Form::open(['action' => 'DonationCentreController@store', 'method' => 'POST']) !!}
                    {{-- <form method="POST" action="{{ route('login') }}"> --}}
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Center Name') }}</label>

                            <div class="col-md-9">
                                <input id="center_name" type="text" class="form-control @error('center_name') is-invalid @enderror" name="center_name" value="{{ old('center_name') }}" required autofocus>

                                @error('center_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="county" class="col-md-2 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-9">
                                {{-- <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus> --}} 
                                    @php
                                        $county = $counties->pluck('name','id')->toArray();
                                    @endphp
                                     {{ Form::select('county', $county, 'Select County where it is located', ['class'=>"form-control",'placeholder' => 'Select County where it is located']) }} 
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="sub_county" class="col-md-2 col-form-label text-md-right">{{ __('Sub County') }}</label>

                            <div class="col-md-9">
                                {{-- <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"> --}}
                                    @php
                                        $sub_county = $sub_counties->pluck('name','id')->toArray();
                                    @endphp
                                     {{ Form::select('sub_county', $sub_county, 'county located in', ['class'=>"form-control",'placeholder' => 'Select sub county where it is located']) }} 
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Add New Center') }}
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