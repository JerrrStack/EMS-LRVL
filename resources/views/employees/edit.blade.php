@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="page-title">Edit Employee</h1>

    @if ($errors->any())
        <div class="form-alert">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('employees.update', $employee) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="page" value="{{ $currentPage }}">
        <div class="form-group">
            <label>First Name</label>
            <input type="text" name="first_name" value="{{ old('first_name', $employee->first_name) }}">
        </div>

        <div class="form-group">
            <label>Last Name</label>
            <input type="text" name="last_name" value="{{ old('last_name', $employee->last_name) }}">
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email', $employee->email) }}">
        </div>

        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="phone" value="{{ old('phone', $employee->phone) }}">
        </div>

        <div class="form-group">
            <label>Department</label>
            <select name="department_id">
                @foreach ($departments as $department)
                    <option value="{{ $department->id }}" @selected((int) old('department_id', $employee->department_id) === $department->id)>
                        {{ $department->department_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Position</label>
            <input type="text" name="position" value="{{ old('position', $employee->position) }}">
        </div>

        <div class="form-group">
            <label>Status</label>
            <select name="status">
                <option value="active" @selected(old('status', $employee->status) === 'active')>Active</option>
                <option value="inactive" @selected(old('status', $employee->status) === 'inactive')>Inactive</option>
            </select>
        </div>

        <button type="submit">Save Changes</button>
    </form>

    <a href="{{ route('employees.index', ['page' => $currentPage]) }}" class="back-link">&larr; Back to list</a>
</div>
@endsection
