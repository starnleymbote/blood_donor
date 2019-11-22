@extends('layouts.main')

@section('content')

<div class="container-fluid">        

    <div class="col-sm-12">

            @if (Session::has('success'))
                <div class="alert alert-success" role="alertdialog">
                    {{Session::get('success')}}
                </div>
            @endif

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

                    @if ($appointment ->read_status == 0)

                        <tr>
                            <td>{{$appointment ->donation_center ->name}}</td>
                            <td>{{$appointment->donation_center ->donor->user ->name}}</td>
                            <td>{{$appointment ->purpose}}</td>
                            <td>{{$appointment ->appointment}}</td>
                            <td><a href="/reply/{{$appointment ->id}}"><i class="fa fa-link"></i> <span>Reply</span></a></td>
                            <td><a href="/markasread/{{$appointment ->id}}"><i class="fa fa-link"></i> <span>Mark as Read</span></a></td>
                        </tr>
                                    
                    @endif
            
                    @empty
                        <h2>No Appointments Today</h2>
                    @endforelse
                    
                </tbody>
            
            </table>
    </div>

</div>
@endsection