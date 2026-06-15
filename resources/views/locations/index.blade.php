@extends('layouts.app')

@section('content')

<div class="container">
    <h2>Locations</h2>

    <a href="{{ route('locations.create') }}" class="btn btn-primary mb-3">
        Add Location
    </a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>City</th>
                <th>Country</th>
				<th>Total Products</th>
                <th width="180">Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach($locations as $location)
            <tr>
                <td>{{ $location->name }}</td>
                <td>{{ $location->city }}</td>
                <td>{{ $location->country }}</td>
				<td>{{ $location->products_count }}</td>

                <td>
                    <a href="{{ route('locations.show', $location->id) }}"
                       class="btn btn-info btn-sm">
                        View
                    </a>

                    <a href="{{ route('locations.edit', $location->id) }}"
                       class="btn btn-warning btn-sm">
                        Edit
                    </a>

                    <form action="{{ route('locations.destroy', $location->id) }}"
                          method="POST"
                          style="display:inline-block">

                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger btn-sm"
                                onclick="return confirm('Delete this location?')">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $locations->links() }}
</div>

@endsection