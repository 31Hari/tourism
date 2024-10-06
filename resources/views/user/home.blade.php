@extends('user.layouts.app')

@section('content')
<div class="home-page">
    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>Discover Your Next Adventure</h1>
            <p>Explore breathtaking destinations and create unforgettable memories.</p>
        </div>
    </section>

    <!-- Featured Destinations -->
    <section class="featured-destinations">
        <h2 class="text-center mb-4">Featured Destinations</h2>
        <div class="row">
            @foreach($featuredDestinations as $destination)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset('images/destination' . $loop->iteration . '.jpg') }}" class="card-img-top" alt="{{ $destination->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $destination->name }}</h5>
                        <p class="card-text">{{ Str::limit($destination->description, 100) }}</p>
                        <p><strong>Category:</strong> {{ $destination->category->name }}</p>
                        <p><strong>Location:</strong> {{ $destination->location->name }}</p>
                        <p><strong>Hotel:</strong> {{ $destination->hotel->name }}</p>
                        <a href="{{ route('user.tours.show', $destination->id) }}" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <!-- Latest Blog Posts -->
    <section class="latest-blog-posts">
        <h2 class="text-center mb-4">Latest Blog Posts</h2>
        <div class="row">
            @foreach($latestBlogPosts as $post)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ Str::limit($post->content, 100) }}</p>
                       
                        @if($post->travel_package)
                        <p><strong>Related Tour:</strong> {{ $post->travel_package->name }}</p>
                        @endif
                        <a href="#" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <!-- Call to Action -->
    <section class="cta bg-primary text-white text-center py-5">
        <h2>Ready to Plan Your Next Trip?</h2>
        <p>Our expert travel planners are here to help you create the perfect itinerary.</p>
        <a href="{{ route('user.travel_planner.create') }}" class="btn btn-light btn-lg">Start Planning</a>
    </section>
</div>
@endsection

@push('styles')
<style>
    .hero {
        background-image: url('https://images.unsplash.com/photo-1476514525535-07fb3b4ae5f1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80');
        background-size: cover;
        background-position: center;
        height: 500px;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: white;
    }

    .hero-content {
        background-color: rgba(0, 0, 0, 0.5);
        padding: 2rem;
        border-radius: 10px;
    }

    .hero h1 {
        font-size: 3rem;
        margin-bottom: 1rem;
    }

    .featured-destinations, .latest-blog-posts {
        padding: 4rem 0;
    }

    .card {
        transition: transform 0.3s;
    }

    .card:hover {
        transform: translateY(-5px);
    }

    .cta {
        margin-top: 4rem;
    }
</style>
@endpush
