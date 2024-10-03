@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>Create Blog Post</h1>

    <form action="{{ route('admin.blogs.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>

        <div class="form-group">
            <label for="content">Content</label>
            <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
        </div>

        <div class="form-group">
            <label for="travel_package_id">Travel Package</label>
            <select class="form-control" id="travel_package_id" name="travel_package_id" required>
                <option value="">Select a travel package</option>
                @foreach($travelPackages as $package)
                    <option value="{{ $package->id }}">{{ $package->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="category_id">Category</label>
            <select class="form-control" id="category_id" name="category_id" required>
                <option value="">Select a category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status" required>
                <option value="draft">Draft</option>
                <option value="published">Published</option>
            </select>
        </div>

        <div class="form-group">
            <label for="publish_date">Publish Date</label>
            <input type="date" class="form-control" id="publish_date" name="publish_date">
        </div>

        <button type="submit" class="btn btn-primary">Create Blog Post</button>
    </form>
</div>
@endsection
