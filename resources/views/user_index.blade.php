@extends('layouts.main')

@section('content')
<div class="row container-fluid">

    <div class="col-sm-8 offset-sm-2">

        <div class="card-header" style="text-align: center;">
                This is your centers banks details:
        </div>

            <div class="card border-info mb-12 offset-mb-2">
                    <div class="card-header" style="width: 100%; text-align: center;">
                        @forelse ($get_center_name as $center_name)
                            <b>{{$center_name ->name}}</b>
                        @empty
                            
                        @endforelse
                        
                    </div>
    
                    <div class="card-body text-primary mb-3" style="text-align: center; padding-top: 10%;">
    
                        <strong>Available pints:</strong> <p class="card-title" style="color: tomato;"> {{$get_blood_level}} </p> 


                        <strong> <p style="color: black;"> Comment: </p></strong> 

                            @if ($get_blood_level > 150)
                                <p style="color: green;"><strong>Your centers blood level is above minimum threshold. Thank you for checking up.</strong></p>
                            @else
                            <p style="color: red;"><strong>Your centers blood level is below minimum threshold. Kindly, save a life by making an effort to donate to your center or any center close to you.</strong></p>
                            @endif
                        
                        <strong>Tip of the day: </strong> <p class="card-title" style="color: cyan;"> Fruits helps in Blood regeneration in your body. </p> 
            
                    </div>
            
            </div>       
        

    </div>
        
</div>
@endsection