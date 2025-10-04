@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Add Employee</h2>
    <a href="{{ route('employee.index') }}" class="btn btn-secondary">Back</a>
</div>

<form action="{{ route('employee.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="employee_id" class="form-label">Employee ID</label>
        <input type="text" class="form-control" id="employee_id" name="employee_id" value="{{ $employeeId }}" readonly>
    </div>
    <div class="mb-3">
        <label for="name" class="form-label">Employee Name</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="mb-3">
        <label for="departement_id" class="form-label">Department</label>
        <select class="form-select" id="departement_id" name="departement_id" required>
            <option value="">-- Select Department --</option>
            @foreach ($departments as $d)
            <option value="{{ $d['id'] }}">{{ $d['departement_name'] }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="address" class="form-label">Address</label>
        <textarea class="form-control" id="address" name="address" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Save Employee</button>
</form>
@endsection