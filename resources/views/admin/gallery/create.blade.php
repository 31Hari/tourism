@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>Upload Media</h1>
   
    <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="type">Type</label>
            <select class="form-control" id="type" name="type" required>
                <option value="image">Image</option>
                <option value="video">Video</option>
                <option value="document">Document</option>
            </select>
        </div>
        <div class="form-group">
            <label for="travel_package_id">Travel Package (Optional)</label>
            <select class="form-control" id="travel_package_id" name="travel_package_id">
                <option value="">Select a Travel Package</option>
                @foreach($travelPackages as $package)
                    <option value="{{ $package->id }}">{{ $package->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="files">Files</label>
            <input type="file" class="form-control-file" id="files" name="files[]" multiple required>
            <small class="form-text text-muted">You can select multiple files. Maximum file size: 10MB</small>
        </div>
        <button type="submit" class="btn btn-primary">Upload</button>
    </form>
</div>
@endsection
