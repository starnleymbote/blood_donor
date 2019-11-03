@extends('layouts.main')

@section('content')

<div class="container row">
    <div class="row container-fluid">
        <div class="col-sm-10">

        

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

        </div>
    
    </div>

<div class="col-md-10">
       <div class="card">
           <div class="card-header" style="background-color: tomato; text-align: center;">{{ __('Add A New Sub County') }}</div>
                <div class="card-body">
                    {!! Form::open(['action' => 'SubCountiesController@store', 'method' => 'POST']) !!}
                    {{-- <form method="POST" action="{{ route('login') }}"> --}}
                        @csrf

                        <div class="form-group row">
                            <label for="sub_county_name" class="col-md-2 col-form-label text-md-right">{{ __('Sub County Name') }}</label>

                            <div class="col-md-9">
                                <input id="sub_county_name" type="text" class="form-control @error('sub_county_name') is-invalid @enderror" name="sub_county_name" required autofocus>

                                @error('sub_county_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                                <label for="county" class="col-md-2 col-form-label text-md-right">{{ __('County') }}</label>
    
                                <div class="col-md-9">
                                    {{-- <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus> --}} 
                                        @php
                                            $county = $counties->pluck('name','id')->toArray();
                                        @endphp
                                         {{ Form::select('county', $county, '', ['class'=>"form-control",'placeholder' => 'Select County where it is located']) }} 
                                    @error('county')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('New Sub County') }}
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