@extends('layouts.app')

@section('content')

<div class="container">
    <h2>Edit Location</h2>

    <form action="{{ route('locations.update', $location->id) }}" method="POST">
        @csrf
        @method('PUT')

        @include('locations.form')

        <button class="btn btn-primary">
            Update
        </button>
    </form>
</div>

@endsection