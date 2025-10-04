@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Edit Employee</h2>
    <a href="{{ route('employee.index') }}" class="btn btn-secondary">Back</a>
</div>

<form action="{{ route('employee.update', $employee['id']) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="employee_id" class="form-label">Employee ID</label>
        <input type="text" class="form-control" id="employee_id" name="employee_id" value="{{ $employee['employee_id'] }}" required>
    </div>
    <div class="mb-3">
        <label for="name" class="form-label">Employee Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $employee['name'] }}" required>
    </div>
    <div class="mb-3">
        <label for="departement_id" class="form-label">Department</label>
        <select class="form-select" id="departement_id" name="departement_id" required>
            <option value="">-- Select Department --</option>
            @foreach ($departments as $d)
                <option value="{{ $d['id'] }}" {{ $employee['departement_id'] == $d['id'] ? 'selected' : '' }}>
                    {{ $d['departement_name'] }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="address" class="form-label">Address</label>
        <textarea class="form-control" id="address" name="address" rows="3">{{ $employee['address'] }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Update Employee</button>
</form>
@endsection
