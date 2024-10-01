@extends('admin.layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-3xl font-semibold mb-6">Dashboard</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Users Card -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-semibold mb-4">Total Users</h2>
            <p class="text-3xl font-bold text-blue-600">1,234</p>
            <p class="text-sm text-gray-500 mt-2">+5% from last month</p>
        </div>

        <!-- Bookings Card -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-semibold mb-4">Total Bookings</h2>
            <p class="text-3xl font-bold text-green-600">567</p>
            <p class="text-sm text-gray-500 mt-2">+12% from last month</p>
        </div>

        <!-- Revenue Card -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-semibold mb-4">Total Revenue</h2>
            <p class="text-3xl font-bold text-purple-600">$98,765</p>
            <p class="text-sm text-gray-500 mt-2">+8% from last month</p>
        </div>

        <!-- Hotels Card -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-semibold mb-4">Total Hotels</h2>
            <p class="text-3xl font-bold text-yellow-600">89</p>
            <p class="text-sm text-gray-500 mt-2">+2 new this month</p>
        </div>

        <!-- Tours Card -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-semibold mb-4">Total Tours</h2>
            <p class="text-3xl font-bold text-red-600">45</p>
            <p class="text-sm text-gray-500 mt-2">+3 new this month</p>
        </div>

        <!-- Support Tickets Card -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-semibold mb-4">Open Support Tickets</h2>
            <p class="text-3xl font-bold text-indigo-600">23</p>
            <p class="text-sm text-gray-500 mt-2">-15% from last month</p>
        </div>
    </div>

    <div class="mt-8">
        <h2 class="text-2xl font-semibold mb-4">Recent Activities</h2>
        <div class="bg-white rounded-lg shadow-md p-6">
            <ul class="space-y-4">
                <li class="flex items-center">
                    <span class="w-2 h-2 bg-blue-500 rounded-full mr-2"></span>
                    <span>New user registered: John Doe</span>
                    <span class="ml-auto text-sm text-gray-500">2 hours ago</span>
                </li>
                <li class="flex items-center">
                    <span class="w-2 h-2 bg-green-500 rounded-full mr-2"></span>
                    <span>New booking: Luxury Suite at Sunset Hotel</span>
                    <span class="ml-auto text-sm text-gray-500">5 hours ago</span>
                </li>
                <li class="flex items-center">
                    <span class="w-2 h-2 bg-yellow-500 rounded-full mr-2"></span>
                    <span>New review: 5 stars for Mountain Trek Tour</span>
                    <span class="ml-auto text-sm text-gray-500">1 day ago</span>
                </li>
                <li class="flex items-center">
                    <span class="w-2 h-2 bg-red-500 rounded-full mr-2"></span>
                    <span>Support ticket resolved: Payment issue</span>
                    <span class="ml-auto text-sm text-gray-500">2 days ago</span>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection
