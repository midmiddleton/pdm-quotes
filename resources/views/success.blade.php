@extends('layouts.app')

@section('content')
<div class="container">
        <div class="col-md-8">
                <h2>Here is your quote {{$name}}</h2>
                <p>Total Mileage - {{$total_mileage}}</p>
                <p>AML Trip cost - £{{$AML_trip_cost}}</p>
                <p>Fuel cost - £{{$actual_fuel_cost}}</p>
                <p>Public transport - £10
                <h1>Total Cost - £{{$total_cost}}</h1>
            </div>
    </div>
</div>
@endsection