@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Attendance History</h2>
    <a href="{{ route('attendance-history.index') }}" class="btn btn-secondary">Back</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Date</th>
            <th>Attendance Type</th>
            <th>Status</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
        @forelse($logs as $log)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ \Carbon\Carbon::parse($log['date_attendance'])->format('Y-m-d H:i') ?? '-' }}</td>
            <td>{{ ucfirst($log['attendance_type'] ?? '-') }}</td>
            <td>{{ $log['status'] ?? '-' }}</td>
            <td>{{ $log['description'] ?? '-' }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="4" class="text-center">No attendance records found</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
