@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">System Logs</h1>
    <div class="row">
        <div class="col-md-3 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Audit Logs</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $auditLogs->count() }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                    <a href="{{ route('audit_logs.index') }}" class="btn btn-primary btn-sm mt-3">View All</a>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">User Auth Logs</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $userAuthLogs->count() }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-shield fa-2x text-gray-300"></i>
                        </div>
                    </div>
                    <a href="{{ route('user_auth_logs.index') }}" class="btn btn-success btn-sm mt-3">View All</a>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">User Activity Logs</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $userActivityLogs->count() }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-clock fa-2x text-gray-300"></i>
                        </div>
                    </div>
                    <a href="{{ route('user_activity_logs.index') }}" class="btn btn-info btn-sm mt-3">View All</a>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Admin Activity Logs</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $adminActivityLogs->count() }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-cog fa-2x text-gray-300"></i>
                        </div>
                    </div>
                    <a href="{{ route('admin_activity_logs.index') }}" class="btn btn-warning btn-sm mt-3">View All</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Audit Logs -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Audit Logs</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Action</th>
                            <th>Details</th>
                            <th>IP Address</th>
                            <th>Timestamp</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($auditLogs as $log)
                            <tr>
                                <td>{{ $log->user ? $log->user->name : 'N/A' }}</td>
                                <td>{{ $log->action }}</td>
                                <td>{{ $log->details }}</td>
                                <td>{{ $log->ip_address }}</td>
                                <td>{{ $log->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- User Authentication Logs -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success">User Authentication Logs</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Action</th>
                            <th>IP Address</th>
                            <th>User Agent</th>
                            <th>Timestamp</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($userAuthLogs as $log)
                            <tr>
                                <td>{{ $log->user->username }}</td>
                                <td>{{ $log->action }}</td>
                                <td>{{ $log->ip_address }}</td>
                                <td>{{ $log->user_agent }}</td>
                                <td>{{ $log->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- User Activity Logs -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info">User Activity Logs</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Action</th>
                            <th>Details</th>
                            <th>IP Address</th>
                            <th>Timestamp</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($userActivityLogs as $log)
                            <tr>
                                <td>{{ $log->user->username }}</td>
                                <td>{{ $log->action }}</td>
                                <td>{{ $log->details }}</td>
                                <td>{{ $log->ip_address }}</td>
                                <td>{{ $log->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Admin Activity Logs -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-warning">Admin Activity Logs</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Admin</th>
                            <th>Action</th>
                            <th>Details</th>
                            <th>IP Address</th>
                            <th>Timestamp</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($adminActivityLogs as $log)
                            <tr>
                                <td>{{ $log->admin->name }}</td>
                                <td>{{ $log->action }}</td>
                                <td>{{ $log->details }}</td>
                                <td>{{ $log->ip_address }}</td>
                                <td>{{ $log->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('.table').DataTable({
            "pageLength": 25,
            "ordering": false,
            "info": false,
            "searching": false,
            "scrollY": "300px",
            "scrollCollapse": true,
            "paging": false
        });
    });
</script>
@endsection
