@extends('layouts.main')

@section('content')

<div class="row container-fluid">

        <div class="col-sm-10">
    
        {!! Form::open(['action' => 'BloodBankController@post_topup','method' => 'POST']) !!}
            <div class="row" style="width: 140%; padding: 1%;">
                    <div class="col-sm-3">
            
                            <div class="card border-primary mb-3">
                                    <div class="card-header">
                                        A+
                                    </div>
            
                                    <div class="card-body text-primary mb-3">
    
                                        <strong>Top Up pints:</strong>  <p class="card-title" style="color: tomato;">{!! Form::number('Apos', '', ['class' =>'form-control','placeholder' => 'Enter amount here']) !!}</p>
                        
                                    </div>
                        
                            </div>
                    </div>
            
                    <div class="col-sm-3">
                            <div class="card border-success mb-3">
            
                                    <div class="card-header">
                                        B+
                                    </div>
            
                                    <div class="card-body text-primary mb-3">
                                        <strong>Available pints:</strong> <p class="card-title" style="color: tomato;"> {!! Form::number('Bpos', '', ['class' =>'form-control','placeholder' => 'Enter amount here']) !!}</p>
                                    </div>
                        
                            </div>
                    </div>
            
                    <div class="col-sm-3">
                            <div class="card border-warning mb-3">
                                    <div class="card-header">
                                        O+
                                    </div>
                                    <div class="card-body text-primary mb-3">
    
                                        <strong>Available pints:</strong> <p class="card-title" style="color: tomato;"> {!! Form::number('Opos', '', ['class' =>'form-control','placeholder' => 'Enter amount here']) !!}</p>
                        
                                    </div>
                        
                            </div>
                    </div>
            
            
            </div>
    
            <div class="row" style="width: 140%; padding: 1%;">
                    <div class="col-sm-3">
            
                            <div class="card border-primary mb-3">
                                    <div class="card-header">
                                        A-
                                    </div>
            
                                    <div class="card-body text-primary mb-3">
    
                                         <strong>Available pints:</strong><p class="card-title" style="color: tomato;">{!! Form::number('Aneg', '', ['class' =>'form-control','placeholder' => 'Enter amount here']) !!}</p>
                        
                                    </div>
                        
                            </div>
                    </div>
            
                    <div class="col-sm-3">
                            <div class="card border-success mb-3">
            
                                    <div class="card-header">
                                        B-
                                    </div>
            
                                    <div class="card-body text-primary mb-3">
    
                                        <strong>Available pints:</strong> <p class="card-title" style="color: tomato;">{!! Form::number('Bneg', '', ['class' =>'form-control','placeholder' => 'Enter amount here']) !!}</p>
                        
                                    </div>
                        
                            </div>
                    </div>
            
                    <div class="col-sm-3">
                            <div class="card border-warning mb-3">
                                    <div class="card-header">
                                        O-
                                    </div>
    
                                    <div class="card-body text-primary mb-3">
    
                                        <strong>Available pints:</strong><p class="card-title" style="color: tomato;">{!! Form::number('Oneg', '', ['class' =>'form-control','placeholder' => 'Enter amount here']) !!}</p>
                        
                                    </div>
                        
                            </div>
                    </div>
    
            
            </div>    
  
    
        </div>
    
        <div class="col-sm-2">
    
            <div class="row container-fluid" style="width: 160%; height: 100%; padding: 10%;">
    
                    <div class="card border-danger mb-3">
                            <div class="card-header">
                                AB
                            </div>
            
                            <div class="card-body text-primary mb-3" style="text-align: center; padding-top: 60%;">
            
                                <strong>Available pints:</strong> <p class="card-title" style="color: tomato;"> {!! Form::number('AB', '', ['class' =>'form-control','placeholder' => 'Enter amount here']) !!}</p> 
                    
                            </div>
                    
                    </div>       
    
            </div>
                 
            
        </div>
    
    </div>
    
    <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Top Up Blood Amount') }}
                </button>

            </div>
    </div>
    
    {!! Form::close() !!}
    

@endsection