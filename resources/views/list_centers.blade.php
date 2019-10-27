@extends('layouts.main')

@section('content')

<div class="row container-fluid">
    <div class="card" style="text-align: center; width: 100%; color: tomato;">
        <div class="card-header" >
            <strong>Centers List</strong>
        </div>
    </div>

    <table class="table table-striped">
        <thead class="thead thead-dark" >
            <th>center Name</th>
            <th>County</th>
            <th>Sub County</th>
            <th>View More Details</th>
        </thead>
        <tbody>
            @forelse ($center as $center_details)

                <tr>
                    <td>{{$center_details ->name}}</td>
                    <td>{{$center_details ->county_name}}</td>
                    <td>{{$center_details ->sub_county}}</td>
                    <td><a href="/bank_details/{{$center_details ->center_id}}"><i class="fa fa-link"></i> <span>View more</span></a></td>
                </tr>
                
            @empty
                
            @endforelse
            
        </tbody>

    </table>

</div>
    
@endsection