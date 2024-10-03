@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>Locations</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        <div class="col-md-8">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Latitude</th>
                        <th>Longitude</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($locations as $location)
                    <tr>
                        <td>{{ $location->id }}</td>
                        <td>{{ $location->name }}</td>
                        <td>{{ $location->description }}</td>
                        <td>{{ $location->latitude }}</td>
                        <td>{{ $location->longitude }}</td>
                        <td>
                            <a href="{{ route('locations.edit', $location->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('locations.destroy', $location->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this location?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="col-md-4">
            <h2>Add New Location</h2>
            <form action="{{ route('admin.locations.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" required maxlength="100">
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea class="form-control" id="description" name="description"></textarea>
                </div>
                <div class="form-group">
                    <label for="latitude">Latitude:</label>
                    <input type="number" class="form-control" id="latitude" name="latitude" step="0.00000001" min="-90" max="90">
                </div>
                <div class="form-group">
                    <label for="longitude">Longitude:</label>
                    <input type="number" class="form-control" id="longitude" name="longitude" step="0.00000001" min="-180" max="180">
                </div>
                <button type="submit" class="btn btn-primary">Add Location</button>
            </form>
        </div>
    </div>
</div>
@endsection
