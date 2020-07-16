@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table table-dark">
        <thead>
            <tr>
            <th scope="col">id</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Total Mileage</th>
            <th scope="col">MinimumCharge</th>
            <th scope="col">Average MPG</th>
            <th scope="col">Cost Per Mile</th>
            <th scope="col">Fuel Cost</th>
            <th scope="col">Public Transport</th>
            <th scope="col">AML Trip Cost</th>
            <th scope="col">Actual Fuel Cost</th>
            <th scope="col">Total Cost</th>
            <th scope="col">Message</th>
            </tr>
        </thead>
        <tbody>
            @foreach($quotes as $quote)
                <tr>
                <td>{{$quote['id']}}</td>
                <td>{{$quote['name']}}</td>
                <td>{{$quote['email']}}</td>
                <td>{{$quote['phone']}}</td>
                <td>{{$quote['total_mileage']}}</td>
                <td>{{$quote['minimum_charge']}}</td>
                <td>{{$quote['average_MPG']}}</td>
                <td>{{$quote['costs_per_mile']}}</td>
                <td>{{$quote['fuel_cost']}}</td>
                <td>{{$quote['public_transport']}}</td>
                <td>{{$quote['AML_trip_cost']}}</td>
                <td>{{$quote['actual_fuel_cost']}}</td>
                <td>{{$quote['total_cost']}}</td>
                <td>{{$quote['message']}}</td>
                <td>

                    <form action="{{ route('quote.delete', [$quote['id']])  }}" method="delete" enctype="multipart/form-data">

  
                        <input type="submit" name="delete" value="Delete" class="btn btn-dark btn-block">
                    </form>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection