<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Tourism') }}</title>

    <!-- Styles -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Optional custom styles -->

    <style>
        :root {
            --primary-color: #3498db;
            --secondary-color: #2ecc71;
            --accent-color: #e74c3c;
            --background-color: #ecf0f1;
            --text-color: #34495e;
        }

        body {
            background-color: var(--background-color);
            color: var(--text-color);
            font-family: 'Arial', sans-serif;
        }

        .navbar {
            background-color: var(--primary-color) !important;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand, .nav-link {
            color: white !important;
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3e%3cpath stroke='rgba(255, 255, 255, 0.5)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }

        .content-wrapper {
            margin-top: 30px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .btn-primary {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
        }

        .btn-primary:hover {
            background-color: #27ae60;
            border-color: #27ae60;
        }

        .footer {
            background-color: var(--primary-color);
            color: white;
            padding: 20px 0;
            margin-top: 40px;
        }

        .nav-item .dropdown-menu {
            background-color: var(--primary-color);
        }

        .nav-item .dropdown-item {
            color: white;
        }

        .nav-item .dropdown-item:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <i class="fas fa-plane-departure mr-2"></i>{{ config('app.name', 'Tourism') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.home') }}"><i class="fas fa-home mr-1"></i>{{ __('Home') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.dashboard') }}"><i class="fas fa-tachometer-alt mr-1"></i>{{ __('Dashboard') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.bookings.index') }}"><i class="fas fa-calendar-check mr-1"></i>{{ __('Bookings') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.reviews.index') }}"><i class="fas fa-star mr-1"></i>{{ __('Reviews') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.profile.index') }}"><i class="fas fa-user mr-1"></i>{{ __('Profile') }}</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-h mr-1"></i>{{ __('More') }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('user.hotels.index') }}"><i class="fas fa-hotel mr-1"></i>{{ __('Hotels') }}</a>
                            <a class="dropdown-item" href="{{ route('user.gallery.index') }}"><i class="fas fa-images mr-1"></i>{{ __('Gallery') }}</a>
                            <a class="dropdown-item" href="{{ route('user.wishlist.index') }}"><i class="fas fa-heart mr-1"></i>{{ __('Wishlist') }}</a>
                            <a class="dropdown-item" href="{{ route('user.support.index') }}"><i class="fas fa-question-circle mr-1"></i>{{ __('Support') }}</a>
                            <a class="dropdown-item" href="{{ route('user.notifications.index') }}"><i class="fas fa-bell mr-1"></i>{{ __('Notifications') }}</a>
                            <a class="dropdown-item" href="{{ route('user.payments.index') }}"><i class="fas fa-credit-card mr-1"></i>{{ __('Payments') }}</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <form method="POST" action="{{ route('user.logout') }}">
                            @csrf
                            <a class="nav-link" href="#" onclick="event.preventDefault(); this.closest('form').submit();">
                                <i class="fas fa-sign-out-alt mr-1"></i>{{ __('Logout') }}
                            </a>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        <div class="container content-wrapper">
            @yield('content')
        </div>
    </main>

    <footer class="footer text-center text-lg-start">
        <div class="container p-4 ">
            <p>&copy; {{ date('Y') }} {{ config('app.name', 'Tourism') }}. All rights reserved.</p>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
