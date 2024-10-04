@extends('admin.layouts.app')
@section('content')
<div class="container">
    <h1>Gallery</h1>
    <a href="{{ route('admin.gallery.create') }}" class="btn btn-primary mb-3">Add New Item</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        @forelse($galleryItems as $item)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->title }}</h5>
                        <p class="card-text">{{ $item->description }}</p>
                        <p>Type: {{ $item->type }}</p>
                        <p>Uploaded by: {{ $item->uploader->username ?? 'Unknown' }}</p>
                        
                        @if($item->mediaFiles->isNotEmpty())
                            <div class="mt-3">
                                @foreach($item->mediaFiles as $file)
                                    @if(in_array(pathinfo($file->file_path, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif']))
                                        <img src="{{ asset('storage/' . $file->file_path) }}" alt="{{ $file->file_name }}" class="img-thumbnail" style="max-width: 100px; max-height: 100px;">
                                    @else
                                        <p>File: {{ $file->file_name }}</p>
                                    @endif
                                @endforeach
                            </div>
                        @endif

                        <div class="mt-3">
                            <a href="{{ route('admin.gallery.edit', $item->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('admin.gallery.destroy', $item->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <p>No gallery items found.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection