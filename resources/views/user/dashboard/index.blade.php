@extends('user.layouts.app')

@section('content')
<div class="card">
    <div class="card-header">{{ __('User Dashboard') }}</div>
    <div class="card-body">
        <h2>Welcome, {{ Auth::user()->username }}!</h2>
        <p>This is your user dashboard.</p>
    </div>
</div>
@endsection
