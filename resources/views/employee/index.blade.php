@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Employee List</h2>
    <a href="{{ route('employee.create') }}" class="btn btn-primary">+ Add Employee</a>
</div>

<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Employee ID</th>
            <th>Name</th>
            <th>Department</th>
            <th>Address</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($employees as $e)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $e['employee_id'] }}</td>
            <td>{{ $e['name'] }}</td>
            <td>{{ $e['departement_name'] ?? 'N/A' }}</td>
            <td>{{ $e['address'] }}</td>
            <td>
                <a href="{{ route('employee.edit', $e['id']) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('employee.destroy', $e['id']) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this employee?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
