<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blood Donor</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

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
                            <div class="card-header" style="text-align: center; background-color: tomato">Request Blood From a center</div>
            
                            <div class="card-body">
                                {!! Form::open(['action' => 'DonationRequestController@store','method' => 'POST']) !!}
                                {{-- <form method="POST" action="AppointmentController@store"> --}}
                                    @csrf
            
                                    <div class="form-group row">
                                            <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Name :') }}</label>
                
                                            <div class="col-md-6">
                                                {!! Form::text('name', '', ['class' =>'form-control','placeholder' => 'Your Name']) !!}
                
                                                @error('purpose')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                    </div>

                                    <div class="form-group row">
                                            <label for="phone" class="col-md-3 col-form-label text-md-right">{{ __('Phone Number :') }}</label>
                
                                            <div class="col-md-6">
                                                {!! Form::text('phone', '', ['class' =>'form-control','placeholder' => 'Your Phone Number']) !!}
                
                                                @error('purpose')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                    </div>

                                    <div class="form-group row">
                                            <label for="center_label" class="col-md-3 col-form-label text-md-right">{{ __('Center Name :') }}</label>
                
                                            <div class="col-md-6">
                                                @php
                                                    $blood_group = $blood_type->pluck('name','id')->toArray();
                                                @endphp
                                                {{ Form::select('blood_group', $blood_group, 'select a your blood_group', ['class'=>"form-control",'placeholder' => 'select blood your blood group(optional)']) }}
                                                {{-- <input id="center" type="email" class="form-control @error('email') is-invalid @enderror" name="center" value="{{ old('email') }}" required autocomplete="email" autofocus> --}}
                
                                                @error('blood_group')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                    <div class="form-group row">
                                        <label for="center_label" class="col-md-3 col-form-label text-md-right">{{ __('Center Name :') }}</label>
            
                                        <div class="col-md-6">
                                            @php
                                                $donation_center = $centre->pluck('name','id')->toArray();
                                            @endphp
                                            {{ Form::select('center_id', $donation_center, 'select a center', ['class'=>"form-control",'placeholder' => 'Donation Center']) }}
                                            {{-- <input id="center" type="email" class="form-control @error('email') is-invalid @enderror" name="center" value="{{ old('email') }}" required autocomplete="email" autofocus> --}}
            
                                            @error('center')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
        
                                    {{-- <div class="form-group row">
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
         --}}
                                        <div class="form-group row">
                                                <label for="purpose_label" class="col-md-3 col-form-label text-md-right">{{ __('Tell us more about anything else:') }}</label>
                    
                                                <div class="col-md-6">
                                                    {!! Form::textarea('purpose', '', ['class' =>'form-control','placeholder' => 'Enter a purpose']) !!}
                    
                                                    @error('')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                        </div>
        
                                        <div class="form-group row mb-0">
                                                <div class="col-md-8 offset-md-4">
                                                    <button type="submit" class="btn btn-primary">
                                                        {{ __('Request Blood') }}
                                                    </button>
                
                                                </div>
                                        </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
    
</body>
</html>