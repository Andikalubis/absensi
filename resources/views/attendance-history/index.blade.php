@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Attendance History</h2>
</div>

<form method="GET" action="{{ route('attendance-history.index') }}" class="row g-3 mb-4">
    <div class="col-md-4">
        <label for="departement_id" class="form-label">Departement</label>
        <select name="departement_id" id="departement_id" class="form-select">
            <option value="">-- All Departements --</option>
            @foreach($departements as $d)
            <option value="{{ $d['id'] }}" @if(request('departement_id')==$d['id']) selected @endif>
                {{ $d['departement_name'] }}
            </option>
            @endforeach
        </select>
    </div>
    <div class="col-md-4 d-flex align-items-end">
        <button type="submit" class="btn btn-primary w-100">Filter</button>
    </div>
</form>

<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Employee ID</th>
            <th>Name</th>
            <th>Departement</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse($employees as $emp)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $emp['employee_id'] ?? '-' }}</td>
            <td>{{ $emp['name'] ?? '-' }}</td>
            <td>{{ $emp['departement_name'] ?? '-' }}</td>
            <td>
                <a href="{{ route('attendance-history.show', $emp['employee_id']) }}" class="btn btn-sm btn-info">
                    View History
                </a>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5" class="text-center">No employees found</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection