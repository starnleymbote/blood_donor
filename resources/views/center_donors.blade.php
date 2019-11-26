@extends('layouts.main')

@section('content')
    
<table class="table table-striped" style="width: 98%">
    <thead class="thead thead-dark">

        <tr>
            <th></th>
            <th>Name</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Phone</th>
            <th>Blood Group</th>
            
        </tr>

    </thead>
    <tbody>

            @forelse ($get_donor_details as $user)
            
                <tr>
                    <td><img src="/storage/images/{{$user ->avatar}}" alt="donor profile" style="width: 48px; height: 48px; border-radius: 50%;"></td>
                    <td>{{$user->user ->name}}</td>
                    <td>{{$user ->user ->email}}</td>
                    <td>{{$user ->gender}}</td>
                    {{-- <td>{{$user->donor_details->donation_center->name}}</td>  --}}
                    <td>{{$user ->phone}}</td>
                    <td>{{$user ->blood_group ->name}}</td>   
                </tr>
            @empty
                
            @endforelse
            
        

    </tbody>

</table>
@endsection