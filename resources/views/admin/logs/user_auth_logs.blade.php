@extends('admin.layouts.app')

@section('title', 'User Authentication Logs')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">User Authentication Logs</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">User Authentication Log List</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="userAuthLogsTable" width="100%" cellspacing="0">
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
                                        <td>{{ $log->created_at->format('Y-m-d H:i:s') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#userAuthLogsTable').DataTable({
            "columnDefs": [
                { "width": "20%", "targets": 3 } // Adjust the width of the User Agent column
            ]
        });
    });
</script>
@endsection