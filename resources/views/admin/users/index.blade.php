@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>User Management</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Username</th>
                <th>Email</th>
                <th>Full Name</th>
                <th>Phone Number</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                @if($user->role === 'user')
                <tr>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                    <td>{{ $user->phone_number }}</td>
                    <td>{{ $user->is_active ? 'Active' : 'Inactive' }}</td>
                    <td>
                        <button 
                            class="btn btn-sm btn-info" 
                            onclick="showUserDetails({{ json_encode($user) }})">
                            View
                        </button>
                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</div>

<!-- User Details Modal -->
<div class="modal fade" id="userDetailsModal" tabindex="-1" role="dialog" aria-labelledby="userDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document"> <!-- Changed to modal-lg for larger modal -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="userDetailsModalLabel">User Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row" id="userDetailsContainer" style="white-space: nowrap;"> <!-- Added style to prevent text wrapping -->
                    <!-- User details will be populated here -->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@section('scripts')
<script>
    function showUserDetails(user) {
        const userDetailsContainer = document.getElementById('userDetailsContainer');
        userDetailsContainer.innerHTML = `
            <div class="col-md-6">
                <ul class="list-group">
                    <li class="list-group-item"><strong>ID:</strong> ${user.id}</li>
                    <li class="list-group-item"><strong>Username:</strong> ${user.username}</li>
                    <li class="list-group-item"><strong>Email:</strong> ${user.email}</li>
                    <li class="list-group-item"><strong>First Name:</strong> ${user.first_name}</li>
                    <li class="list-group-item"><strong>Last Name:</strong> ${user.last_name}</li>
                </ul>
            </div>
            <div class="col-md-6">
                <ul class="list-group">
                    <li class="list-group-item"><strong>Gender:</strong> ${user.gender || 'N/A'}</li>
                    <li class="list-group-item"><strong>Phone Number:</strong> ${user.phone_number}</li>
                    <li class="list-group-item"><strong>Aadhar Number:</strong> ${user.aadhar_number || 'N/A'}</li>
                    <li class="list-group-item"><strong>Driving License:</strong> ${user.driving_license || 'N/A'}</li>
                    <li class="list-group-item"><strong>Voter ID:</strong> ${user.voter_id || 'N/A'}</li>
                    <li class="list-group-item"><strong>Role:</strong> ${user.role}</li>
                    <li class="list-group-item"><strong>Status:</strong> ${user.is_active ? 'Active' : 'Inactive'}</li>
                </ul>
            </div>
        `;
        $('#userDetailsModal').modal('show');
    }
</script>
@endsection

@endsection
