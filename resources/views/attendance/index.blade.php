@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Attendance</h2>
</div>

<div class="row">
    <!-- Check-in Card -->
    <div class="col-md-6 mb-4">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">Check In</div>
            <div class="card-body">
                <form action="{{ route('attendance.checkin') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="employee_id_in" class="form-label">Employee ID</label>
                        <input type="text" class="form-control" id="employee_id_in" name="employee_id" required>
                    </div>
                    <div class="mb-3">
                        <label for="note_in" class="form-label">Note</label>
                        <input type="text" class="form-control" id="note_in" name="note" placeholder="Optional">
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Check In</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Check-out Card -->
    <div class="col-md-6 mb-4">
        <div class="card shadow-sm">
            <div class="card-header bg-success text-white">Check Out</div>
            <div class="card-body">
                <form action="{{ route('attendance.checkout') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="employee_id_out" class="form-label">Employee ID</label>
                        <input type="text" class="form-control" id="employee_id_out" name="employee_id" required>
                    </div>
                    <div class="mb-3">
                        <label for="note_out" class="form-label">Note</label>
                        <input type="text" class="form-control" id="note_out" name="note" placeholder="Optional">
                    </div>
                    <button type="submit" class="btn btn-success w-100">Check Out</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
