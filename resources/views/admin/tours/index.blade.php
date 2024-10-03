@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>Travel Packages</h1>

    <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Duration (days)</th>
                    <th>Status</th>
                    <th>Category</th>
                    <th>Plan</th>
                    <th>Location</th>
                    <th>Hotel</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($travelPackages as $package)
                <tr>
                    <td>{{ $package->id }}</td>
                    <td>{{ $package->name }}</td>
                    <td>{{ Str::limit($package->description, 50) }}</td>
                    <td>{{ $package->start_date->format('Y-m-d') }}</td>
                    <td>{{ $package->end_date->format('Y-m-d') }}</td>
                    <td>{{ $package->duration }}</td>
                    <td>{{ ucfirst($package->status) }}</td>
                    <td>{{ $package->category->name ?? 'N/A' }}</td>
                    <td>{{ $package->plan->name ?? 'N/A' }}</td>
                    <td>{{ $package->location->name ?? 'N/A' }}</td>
                    <td>{{ $package->hotel->name ?? 'N/A' }}</td>
                    <td>
                        <a href="#" class="btn btn-sm btn-primary edit-package" data-package-id="{{ $package->id }}">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <h2 id="form-title" class="mt-4">Create Travel Package</h2>

    <form id="package-form" action="{{ route('admin.tour.store') }}" method="POST">
    @csrf
    <input type="hidden" id="package-id" name="package_id">

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
            </div>

            <div class="form-group">
                <label for="start_date">Start Date</label>
                <input type="date" class="form-control" id="start_date" name="start_date" required>
            </div>

            <div class="form-group">
                <label for="end_date">End Date</label>
                <input type="date" class="form-control" id="end_date" name="end_date" required>
            </div>
        </div>

        <div class="col-md-6">
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
                <label for="plan_id">Plan</label>
                <select class="form-control" id="plan_id" name="plan_id" required>
                    <option value="">Select a plan</option>
                    @foreach($plans as $plan)
                        <option value="{{ $plan->id }}">{{ $plan->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="location_id">Location</label>
                <select class="form-control" id="location_id" name="location_id" required>
                    <option value="">Select a location</option>
                    @foreach($locations as $location)
                        <option value="{{ $location->id }}">{{ $location->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="hotel_id">Hotel</label>
                <select class="form-control" id="hotel_id" name="hotel_id" required>
                    <option value="">Select a hotel</option>
                    @foreach($hotels as $hotel)
                        <option value="{{ $hotel->id }}">{{ $hotel->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="">Select a status</option>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Save Travel Package</button>
</form>

</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('package-form');
    const formTitle = document.getElementById('form-title');
    const editButtons = document.querySelectorAll('.edit-package');

    editButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const packageId = this.getAttribute('data-package-id');
            formTitle.textContent = 'Edit Travel Package';
            form.action = `/admin/tour/${packageId}`;
            form.method = 'POST';

            // Add method spoofing for PUT request
            let methodField = form.querySelector('input[name="_method"]');
            if (!methodField) {
                methodField = document.createElement('input');
                methodField.type = 'hidden';
                methodField.name = '_method';
                form.appendChild(methodField);
            }
            methodField.value = 'PUT';

            // Fetch package data and populate form
            fetch(`/admin/tour/${packageId}/edit`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('package-id').value = data.id;
                    document.getElementById('name').value = data.name;
                    document.getElementById('description').value = data.description;
                    document.getElementById('start_date').value = data.start_date;
                    document.getElementById('end_date').value = data.end_date;
                    document.getElementById('category_id').value = data.category_id;
                    document.getElementById('plan_id').value = data.plan_id;
                    document.getElementById('location_id').value = data.location_id;
                    document.getElementById('hotel_id').value = data.hotel_id;
                    document.getElementById('status').value = data.status;
                });
        });
    });
});
</script>
@endsection
