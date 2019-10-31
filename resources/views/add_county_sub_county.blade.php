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