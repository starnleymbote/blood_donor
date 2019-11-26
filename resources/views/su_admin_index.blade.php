@extends('layouts.main')

@section('content')

<div class="row container-fluid">

    {{-- this is what the admin sees when he/she logs in to the system --}}

    @if (Auth::User()->role_id == 2)
        

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