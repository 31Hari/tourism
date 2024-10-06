@extends('user.layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">User Dashboard</h1>
    <div class="row">
        <!-- Bookings Card -->
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-calendar-check mr-2"></i>Bookings</h5>
                    <p class="card-text">View and manage your tour and hotel bookings.</p>
                    <a href="{{ route('user.bookings.index') }}" class="btn btn-primary">Go to Bookings</a>
                </div>
            </div>
        </div>

        <!-- Reviews Card -->
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-star mr-2"></i>Reviews</h5>
                    <p class="card-text">See your reviews for hotels and tours.</p>
                    <a href="{{ route('user.reviews.index') }}" class="btn btn-primary">View Reviews</a>
                </div>
            </div>
        </div>

        <!-- Profile Card -->
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-user mr-2"></i>Profile</h5>
                    <p class="card-text">Update your personal information and preferences.</p>
                    <a href="{{ route('user.profile.index') }}" class="btn btn-primary">Edit Profile</a>
                </div>
            </div>
        </div>

        <!-- Hotels Card -->
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-hotel mr-2"></i>Hotels</h5>
                    <p class="card-text">Browse and book hotels for your trips.</p>
                    <a href="{{ route('user.hotels.index') }}" class="btn btn-primary">Explore Hotels</a>
                </div>
            </div>
        </div>

        <!-- Gallery Card -->
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-images mr-2"></i>Gallery</h5>
                    <p class="card-text">View photos from your trips and destinations.</p>
                    <a href="{{ route('user.gallery.index') }}" class="btn btn-primary">Open Gallery</a>
                </div>
            </div>
        </div>

        <!-- Wishlist Card -->
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-heart mr-2"></i>Wishlist</h5>
                    <p class="card-text">Manage your saved tours and hotels.</p>
                    <a href="{{ route('user.wishlist.index') }}" class="btn btn-primary">View Wishlist</a>
                </div>
            </div>
        </div>

        <!-- Support Card -->
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-question-circle mr-2"></i>Support</h5>
                    <p class="card-text">Get help and submit support tickets.</p>
                    <a href="{{ route('user.support.index') }}" class="btn btn-primary">Contact Support</a>
                </div>
            </div>
        </div>

        <!-- Notifications Card -->
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-bell mr-2"></i>Notifications</h5>
                    <p class="card-text">View your latest notifications and updates.</p>
                    <a href="{{ route('user.notifications.index') }}" class="btn btn-primary">See Notifications</a>
                </div>
            </div>
        </div>

        <!-- Payments Card -->
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-credit-card mr-2"></i>Payments</h5>
                    <p class="card-text">Manage your payment methods and transactions.</p>
                    <a href="{{ route('user.payments.index') }}" class="btn btn-primary">View Payments</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
