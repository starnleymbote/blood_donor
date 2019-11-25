@extends('layouts.main')

@section('content')
<div class="row container-fluid">

    @if (Auth::User()->role_id == 2)
        
    
        <div class="col-sm-8 offset-sm-2">

            <div class="card-header" style="text-align: center;">
                    This is your centers banks details:
            </div>

                <div class="card border-info mb-12 offset-mb-2">
                        <div class="card-header" style="width: 100%; text-align: center;">
                            {{-- @forelse ($get_center_name as $center_name)
                                <b>{{$center_name ->name}}</b>
                            @empty
                                
                            @endforelse
                             --}}
                        </div>
        
                        <div class="card-body text-primary mb-3" style="text-align: center; padding-top: 10%;">
        
                            {{-- <strong>Available pints:</strong> <p class="card-title" style="color: tomato;"> {{$get_blood_level}} </p>  --}}
                             <strong>Available pints:</strong> <p class="card-title" style="color: tomato;"> 100pints </p> 


                            <strong> <p style="color: black;"> Comment: </p></strong> 

                                {{-- @if ($get_blood_level > 150)
                                    <p style="color: green;"><strong>Your centers blood level is above minimum threshold. Thank you for checking up.</strong></p>
                                @else
                                <p style="color: red;"><strong>Your centers blood level is below minimum threshold. Kindly, save a life by making an effort to donate to your center or any center close to you.</strong></p>
                                @endif
                             --}}
                            <strong>Tip of the day: </strong> <p class="card-title" style="color: cyan;"> Fruits helps in Blood regeneration in your body. </p> 
                
                        </div>
                
                </div>       
            

        </div>

    @endif

    {{-- this is what the admin sees when he/she logs in to the system --}}

    @if (Auth::User()->role_id == 1)
        

    <div class="col-sm-10 offset-sm-1">

        @if (count($critical_level) > 0)
            
        <div class="card">

                <div class="card-header" style="text-align: center; background-color: red;">
                    <b> Critical Zone </b>
                </div>

            </div>
            
            <table class="table">

                    <thead class="thead-dark">
                        
                      <tr>
                            <th scope="col">Center Name</th>
                            <th scope="col">Blood Type</th>
                            <th></th>
                      </tr>

                    </thead>
                    <tbody>
                        
                        @foreach ($critical_level as $critical)
                        
                            <tr>
                                <th>{{$critical ->centre ->name}}</th>
                                <td>{{$critical ->blood_type ->name}}</td>
                                <td><a href="/blood_transfer_view/{{$critical ->centre ->id}}">Inter Center Blood Transfer</a></td>
                            </tr>

                      @endforeach

                    </tbody>
                  </table>

                @endif

                @if (count($average_level) > 0)
            
                <div class="card" style="margin-top: 13%;">

                    <div class="card-header" style="text-align: center; background-color: brown;">
                        <b> Average Zone </b>
                    </div>

                </div>

            <table class="table">

                    <thead class="thead-dark">
                    
                      <tr>
                            <th scope="col">Center Name</th>
                            <th scope="col">Blood Type</th>
                            
                      </tr>

                    </thead>
                    <tbody>
                            @foreach ($average_level as $average)
                      <tr>
                        <th>{{$average ->centre ->name}}</th>
                        <td>{{$average ->blood_type ->name}}</td>
                      </tr>

                      @endforeach

                      <tr>
                            <td colspan="2" style="text-align: center;"><a href="/drive_view">Initate A blood Drive</a></td>
                      </tr>
                      
                    </tbody>
                    
                  </table>

                  @endif

                
    
        </div>

    @endif
        
</div>
@endsection