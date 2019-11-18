@extends('layouts.main')

@section('content')
    
    <table class="table table-striped" style="width: 98%">
        <thead class="thead thead-dark">

            <tr>
                <th></th>
                <th>Name</th>
                <th>Email</th>
                <th>Gender</th>
                {{-- <th>Main Donation Center</th> --}}
                <th>Phone</th>
                <th>Blood Group</th>
                
            </tr>

        </thead>
        <tbody>

                @forelse ($users as $user)
                
                    <tr>
                        <td><img src="/storage/images/{{$user->donor_details->avatar}}" alt="donor profile" style="width: 48px; height: 48px; border-radius: 50%;"></td>
                        <td>{{$user->name}}</td>
                        <td>{{$user ->email}}</td>
                        <td>{{$user->donor_details->gender}}</td>
                        {{-- <td>{{$user->donor_details->donation_center->name}}</td>  --}}
                        <td>{{$user->donor_details->phone}}</td>
                        <td>{{$user->donor_details->blood_group->name}}</td>   
                    </tr>
                @empty
                    
                @endforelse
                
            

        </tbody>

    </table>
@endsection