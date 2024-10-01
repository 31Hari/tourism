@extends('user.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">{{ __('Menu') }}</div>
                <div class="card-body">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="{{ route('user.dashboard') }}">{{ __('Dashboard') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="{{ route('user.bookings.index') }}">{{ __('Bookings') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="{{ route('user.bookings.create') }}">{{ __('Create Booking') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="{{ route('user.reviews.index') }}">{{ __('Reviews') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="{{ route('user.reviews.create') }}">{{ __('Create Review') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="{{ route('user.profile.index') }}">{{ __('Profile') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="{{ route('user.hotels.index') }}">{{ __('Hotels') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="{{ route('user.tours.index') }}">{{ __('Tours') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="{{ route('user.gallery.index') }}">{{ __('Gallery') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="{{ route('user.wishlist.index') }}">{{ __('Wishlist') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="{{ route('user.support.index') }}">{{ __('Support') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="{{ route('user.notifications.index') }}">{{ __('Notifications') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="{{ route('user.payments.index') }}">{{ __('Payments') }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('User Dashboard') }}</div>
                <div class="card-body">
                    <h2>Welcome, {{ Auth::user()->username }}!</h2>
                    <p>This is your user dashboard.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
