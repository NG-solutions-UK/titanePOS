@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="card">

        <div class="card-header">
            <h4>Activity Logss</h4>
        </div>

        <div class="card-body table-responsive">

            <table class="table table-bordered table-striped">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User</th>
                        <th>Action</th>
                        <th>Table</th>
                        <th>Record ID</th>
                        <th>Old Values</th>
                        <th>New Values</th>
                        <th>IP Address</th>
                        <th>Date</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($logs as $log)

                        <tr>

                            <td>{{ $log->id }}</td>

                            <td>
                                {{ $log->user->name ?? 'System' }}
                            </td>

                            <td>
                                @if($log->action == 'created')
                                    <span class="badge bg-success">Created</span>
                                @elseif($log->action == 'updated')
                                    <span class="badge bg-warning">Updated</span>
                                @elseif($log->action == 'deleted')
                                    <span class="badge bg-danger">Deleted</span>
                                @else
                                    <span class="badge bg-secondary">{{ $log->action }}</span>
                                @endif
                            </td>

                            <td>{{ $log->table_name }}</td>

                            <td>{{ $log->record_id }}</td>

                            <td>
                                @if($log->old_values)
                                    <pre style="white-space: pre-wrap; font-size: 12px;">
{{ json_encode($log->old_values, JSON_PRETTY_PRINT) }}
                                    </pre>
                                @else
                                    -
                                @endif
                            </td>

                            <td>
                                @if($log->new_values)
                                    <pre style="white-space: pre-wrap; font-size: 12px;">
{{ json_encode($log->new_values, JSON_PRETTY_PRINT) }}
                                    </pre>
                                @else
                                    -
                                @endif
                            </td>

                            <td>{{ $log->ip_address }}</td>

                            <td>{{ $log->created_at->format('d M Y H:i') }}</td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="9" class="text-center">No logs found</td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

        <div class="card-footer">
            {{ $logs->links() }}
        </div>

    </div>

</div>

@endsection