@extends('layouts.main')

@section('content')

<div class="card" style="text-align: center; width: 100%; background-color: tomato;">
        <div class="card-header" >
           <strong>Donation Records</strong>
       </div>
</div>

<table class="table table-striped">

    <thead class="thead thead-dark" >
        <th>Center Name</th>
        <th>Your Name</th>
        <th>Pint Donated</th>
        <th>Donation Date</th>
    </thead>

    <tbody>
        {{-- @forelse ($appointments as $appointment)

        @if ($appointment ->read_status == 0)

            <tr>
                <td>{{$appointment ->donation_center ->name}}</td>
                <td>{{$appointment ->donor ->user ->name}}</td>
                <td>{{$appointment ->purpose}}</td>
                <td>{{$appointment ->appointment}}</td>
                <td><a href="/reply/{{$appointment ->id}}"><i class="fa fa-link"></i> <span>Reply</span></a></td>
                <td><a href="/markasread/{{$appointment ->id}}"><i class="fa fa-link"></i> <span>Mark as Read</span></a></td>
            </tr>
                        
        @endif

        @empty
            <h2>No Appointments Today</h2>
        @endforelse
         --}}
    </tbody>

</table>
    
@endsection