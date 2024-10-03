@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>Edit Location</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <div class="col-md-8">
            <form action="{{ route('locations.update', $location->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $location->name) }}" required maxlength="100">
                </div>

                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea class="form-control" id="description" name="description">{{ old('description', $location->description) }}</textarea>
                </div>

                <div class="form-group">
                    <label for="latitude">Latitude:</label>
                    <input type="number" class="form-control" id="latitude" name="latitude" step="0.00000001" min="-90" max="90" value="{{ old('latitude', $location->latitude) }}">
                </div>

                <div class="form-group">
                    <label for="longitude">Longitude:</label>
                    <input type="number" class="form-control" id="longitude" name="longitude" step="0.00000001" min="-180" max="180" value="{{ old('longitude', $location->longitude) }}">
                </div>

                <button type="submit" class="btn btn-primary">Update Location</button>
                <a href="{{ route('admin.locations.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection