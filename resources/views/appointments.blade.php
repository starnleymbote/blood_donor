@extends('layouts.main')

@section('content')
{{$appointments}}
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
                    <th>Get in touch</th>
                    <th>Mark as read</th>
                </thead>

                <tbody>
                    @forelse ($appointments as $appointment)
        
                        <tr>
                            
                        </tr>
                        
                    @empty
                        <h2>No Appointments Today</h2>
                    @endforelse
                    
                </tbody>
            
            </table>
    </div>

</div>
@endsection