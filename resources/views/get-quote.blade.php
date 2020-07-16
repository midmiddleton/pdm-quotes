@extends('layouts.app')

@section('content')
<div class="container">
<body>
    <div class="container mt-5">
        <!-- Success message -->
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
        @endif

        <form action="{{ route('quote.store') }}" method="post" enctype="multipart/form-data">

            <!-- CROSS Site Request Forgery Protection -->
            @csrf

            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="name" id="name">
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email" id="email">
            </div>

            <div class="form-group">
                <label>Phone</label>
                <input type="text" class="form-control" name="phone" id="phone">
            </div>

            <div class="form-group">
                <label>Total mileage</label>
                <input type="text" class="form-control" name="total mileage" id="subject">
            </div>

            <div class="form-group">
                <label>Message</label>
                <textarea class="form-control" name="message" id="message" rows="4"></textarea>
            </div>

            <input type="submit" name="send" value="Submit" class="btn btn-dark btn-block">
        </form>
    </div>
</body>

</html>
@endsection