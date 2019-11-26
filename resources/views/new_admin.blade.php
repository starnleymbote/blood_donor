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
                {{-- card --}}
            <div class="card">
                <div class="card-header" style="text-align: center; background-color: tomato">New Admin Registration</div>

                <div class="card-body">
                        {!! Form::open(['action' => 'UserController@storenewadmin', 'method' => 'POST','enctype'=>'multipart/form-data']) !!}
                    
                        @csrf

                        <div class="form-group row">
                            <label for="admin_name" class="col-md-3 col-form-label text-md-right">{{ __('Full Name :') }}</label>

                            <div class="col-md-8">

                                <input id="names" type="text" class="form-control @error('names') is-invalid @enderror" name="names" value="{{ old('names') }}" required autofocus>

                                @error('names')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-3 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- <div class="form-group row">
                                <label for="phone_label" class="col-md-3 col-form-label text-md-right">{{ __('Phone Number :') }}</label>
    
                                <div class="col-md-8">
                                    <input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autofocus>
    
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                        </div> --}}
                        
                        {{-- <div class="form-group row">
                                <label for="User_profile_label" class="col-md-3 col-form-label text-md-right">{{ __('Profile Picture :') }}</label>
    
                                <div class="col-md-8">
                                    <input id="profile" type="file" class="form-control @error('profile') is-invalid @enderror" name="profile" value="{{ old('profile') }}" required autofocus>
    
                                    @error('profile')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                        </div> --}}

                        {{-- admin password - default password  --}}
                        {!! Form::hidden('password', 'password', ['class'=>'form-control']) !!}

                        {{-- admin role id  --}}
                        {!! Form::hidden('role_id', '2', ['class'=>'form-control']) !!}

                        <div class="form-group row">
                            <label for="center_label" class="col-md-3 col-form-label text-md-right">{{ __('Center Requesting from :') }}</label>
    
                            <div class="col-md-8">
                                @php
                                    $requesting_from = $centers->pluck('name','id')->toArray();
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


                        <div class="form-group row mb-0">

                            <div class="col-md-8 offset-md-4">

                                <button type="submit" class="btn btn-primary">

                                    {{ __('Add New Admin') }}

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
