@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h2>Assign Category to Plan</h2>
    <form action="{{ route('category_plan.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="plan_id">Select Plan:</label>
            <select name="plan_id" id="plan_id" class="form-control" required>
                <option value="">Choose a plan</option>
                @foreach($plans as $plan)
                    <option value="{{ $plan->id }}">{{ $plan->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="category_id">Select Category:</label>
            <select name="category_id" id="category_id" class="form-control" required>
                <option value="">Choose a category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Assign Category to Plan</button>
    </form>
</div>
@endsection
