@extends('layouts.main')

@section('content')

<div class="container-fluid">        

    <div class="col-sm-12">

            <div class="card" style="text-align: center; width: 100%; background-color: tomato;">
                    <div class="card-header" >
                       <strong>Centers List</strong>
                   </div>
            </div>

            <table class="table table-striped">

                <thead class="thead thead-dark" >
                    <th>Center Name</th>
                    <th>Donor Name</th>
                    <th>Request</th>
                    <th>Scheduled Date</th>
                    <th>Get in touch</th>
                    <th>Mark as read</th>
                </thead>

                <tbody>
                    @forelse ($appointments as $appointment)
        
                        <tr>
                            <td>{{$appointment ->donor ->donation_center ->name}}</td>
                            <td>{{$appointment ->donor ->user ->name}}</td>
                            <td>{{$appointment ->purpose}}</td>
                            <td>{{$appointment ->appointment}}</td>
                            <td>Reply</td>
                            <td>Mark As Read</td>
                        </tr>
                        
                    @empty
                        <h2>No Appointments Today</h2>
                    @endforelse
                    
                </tbody>
            
            </table>
    </div>

</div>
@endsection