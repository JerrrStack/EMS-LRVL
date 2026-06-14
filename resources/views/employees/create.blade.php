@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="page-title">Register Employee</h1>

    @if ($errors->any())
        <div class="form-alert">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('employees.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Employee No.</label>
            <input type="text" name="employee_no" placeholder="e.g. EMP004" value="{{ old('employee_no') }}">
        </div>

        <div class="form-group">
            <label>First Name</label>
            <input type="text" name="first_name" value="{{ old('first_name') }}">
        </div>

        <div class="form-group">
            <label>Last Name</label>
            <input type="text" name="last_name" value="{{ old('last_name') }}">
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email') }}">
        </div>

        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="phone" value="{{ old('phone') }}">
        </div>

        <div class="form-group">
            <label>Department</label>
            <select name="department_id">
                <option value="">Select department</option>
                @foreach ($departments as $department)
                    <option value="{{ $department->id }}" @selected((int) old('department_id') === $department->id)>
                        {{ $department->department_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Position</label>
            <input type="text" name="position" value="{{ old('position') }}">
        </div>

        <div class="form-group">
            <label>Salary</label>
            <input type="number" name="salary" step="0.01" min="0" value="{{ old('salary', 0) }}">
        </div>

        <div class="form-group">
            <label>Hire Date</label>
            <input type="date" name="hire_date" value="{{ old('hire_date') }}">
        </div>

        <div class="form-group">
            <label>Status</label>
            <select name="status">
                <option value="active" @selected(old('status', 'active') === 'active')>Active</option>
                <option value="inactive" @selected(old('status') === 'inactive')>Inactive</option>
            </select>
        </div>

        <button type="submit">Register Employee</button>
    </form>

    <a href="{{ route('employees.index') }}" class="back-link">&larr; Back to list</a>
</div>
@endsection
