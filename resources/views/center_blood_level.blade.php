@extends('layouts.main')

@section('content')

<div class="row">

            <div class="col-sm-5 offset-sm-1">
                    <button type="button" class="btn btn-primary" onclick="location.href = '/top_up';" style="width: 80%; padding-left: 2%" ><b>Top Up Blood Bank</b></button>
            </div>
    
            <div class="col-sm-5 offset-sm-1">
                    <button type="button" class="btn btn-primary" onclick="location.href = '/edit/';" style="width: 80%; padding-top: 2%" ><b>Dispense Blood</b></button>
            </div>

</div>

<div class="row container-fluid">

    <div class="col-sm-10">

        <div class="row" style="width: 140%; padding: 1%;">
                <div class="col-sm-3">
        
                        <div class="card border-primary mb-3">
                                <div class="card-header">
                                    A+
                                </div>
        
                                <div class="card-body text-primary mb-3">

                                    <strong>Available pints:</strong>  <p class="card-title" style="color: tomato;">{{$Apos}}</p>
                    
                                </div>
                    
                        </div>
                </div>
        
                <div class="col-sm-3">
                        <div class="card border-success mb-3">
        
                                <div class="card-header">
                                    B+
                                </div>
        
                                <div class="card-body text-primary mb-3">
                                    <strong>Available pints:</strong> <p class="card-title" style="color: tomato;"> {{$Bpos}}</p>
                                </div>
                    
                        </div>
                </div>
        
                <div class="col-sm-3">
                        <div class="card border-warning mb-3">
                                <div class="card-header">
                                    O+
                                </div>
                                <div class="card-body text-primary mb-3">

                                    <strong>Available pints:</strong> <p class="card-title" style="color: tomato;"> {{$Opos}}</p>
                    
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

                                     <strong>Available pints:</strong><p class="card-title" style="color: tomato;">{{$Aneg}}</p>
                    
                                </div>
                    
                        </div>
                </div>
        
                <div class="col-sm-3">
                        <div class="card border-success mb-3">
        
                                <div class="card-header">
                                    B-
                                </div>
        
                                <div class="card-body text-primary mb-3">

                                    <strong>Available pints:</strong> <p class="card-title" style="color: tomato;">{{$Bneg}}</p>
                    
                                </div>
                    
                        </div>
                </div>
        
                <div class="col-sm-3">
                        <div class="card border-warning mb-3">
                                <div class="card-header">
                                    O-
                                </div>

                                <div class="card-body text-primary mb-3">

                                    <strong>Available pints:</strong><p class="card-title" style="color: tomato;">{{$Oneg}}</p>
                    
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
        
                            <strong>Available pints:</strong> <p class="card-title" style="color: tomato;"> {{$Bneg}} </p> 
                
                        </div>
                
                </div>       

        </div>
             
        
    </div>

</div>


      
<div class="row justify-content-center" >
    <div class="card border-dark mb-3" style="width: 90%; text-align: center; padding-left: 20px; padding-right: 20px;">
        <div class="card-header"> Total Available Amount (pints)</div>

        <div class="card-body text-primary mb-3">
                <h2><strong><p style="color: darkgreen;">{{$total_blood_amount}}</p></strong></h2>
        </div>

    </div>

</div>

    
@endsection