@extends('admin.layouts.app')


@section('content')
<div class="container">
    <h1>Hotels</h1>
    <a href="{{ route('admin.hotels.create') }}" class="btn btn-primary mb-3">Add New Hotel</a>
    
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Location</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($hotels as $hotel)
            <tr>
                <td>{{ $hotel->id }}</td>
                <td>{{ $hotel->name }}</td>
                <td>{{ $hotel->location ? $hotel->location->name : 'N/A' }}</td>
                <td>
    <a href="{{ route('admin.hotels.edit', $hotel->id) }}" class="btn btn-sm btn-primary">Edit</a>
    <form action="{{ route('admin.hotels.destroy', $hotel->id) }}" method="POST" style="display: inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this hotel?')">Delete</button>
    </form>
</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $hotels->links() }}
</div>
@endsection
