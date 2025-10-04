@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Edit Department</h2>
    <a href="{{ route('departement.index') }}" class="btn btn-secondary">Back</a>
</div>

<form action="{{ route('departement.update', $departments['id']) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="departement_name" class="form-label">Department Name</label>
        <input type="text" class="form-control" id="departement_name" name="departement_name" value="{{ $departments['departement_name'] }}" required>
    </div>
    <div class="mb-3">
        <label for="max_clock_in_time" class="form-label">Max Clock In Time</label>
        <input type="time" class="form-control" id="max_clock_in_time" name="max_clock_in_time" value="{{ $departments['max_clock_in_time'] }}" required>
    </div>
    <div class="mb-3">
        <label for="max_clock_out_time" class="form-label">Max Clock Out Time</label>
        <input type="time" class="form-control" id="max_clock_out_time" name="max_clock_out_time" value="{{ $departments['max_clock_out_time'] }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Update Department</button>
</form>
@endsection
