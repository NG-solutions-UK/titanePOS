@extends('layouts.app')

@section('content')

<div class="container">
    <h2>Location Details</h2>

    <table class="table table-bordered">
        <tr>
            <th>Name</th>
            <td>{{ $location->name }}</td>
        </tr>

        <tr>
            <th>Address</th>
            <td>{{ $location->address }}</td>
        </tr>

        <tr>
            <th>City</th>
            <td>{{ $location->city }}</td>
        </tr>

        <tr>
            <th>Country</th>
            <td>{{ $location->country }}</td>
        </tr>

        <tr>
            <th>Postcode</th>
            <td>{{ $location->postcode }}</td>
        </tr>

        <tr>
            <th>Latitude</th>
            <td>{{ $location->latitude }}</td>
        </tr>

        <tr>
            <th>Longitude</th>
            <td>{{ $location->longitude }}</td>
        </tr>
    </table>

    <a href="{{ route('locations.index') }}"
       class="btn btn-secondary">
        Back
    </a>
</div>

@endsection