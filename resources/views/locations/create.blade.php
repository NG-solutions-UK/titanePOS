@extends('layouts.app')

@section('content')

<div class="container">
    <h2>Create Location</h2>

    <form action="{{ route('locations.store') }}" method="POST">
        @csrf

        @include('locations.form')

        <button class="btn btn-success">
            Save
        </button>
    </form>
</div>

@endsection