@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Department List</h2>
    <a href="{{ route('departement.create') }}" class="btn btn-primary mb-3">+ Add departement</a>
</div>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Max Clock In</th>
            <th>Max Clock Out</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($departments ?? [] as $d)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $d['departement_name'] }}</td>
            <td>{{ $d['max_clock_in_time'] }}</td>
            <td>{{ $d['max_clock_out_time'] }}</td>
            <td>
                <a href="{{ route('departement.edit', $d['id']) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('departement.destroy', $d['id']) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
