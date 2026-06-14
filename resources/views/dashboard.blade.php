@extends('layouts.app')

@section('content')
<div class="container container-wide">
    <div class="dashboard-header">
        <h1 class="page-title">Dashboard</h1>
        <a href="{{ route('employees.create') }}" class="btn-add">+ Add Employee</a>
    </div>

    <div class="table-wrap">
        <table class="employee-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Position</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($employees as $employee)
                    <tr>
                        <td>{{ $employee->id }}</td>
                        <td>{{ $employee->first_name }} {{ $employee->last_name }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>{{ $employee->position }}</td>
                        <td>
                            <span class="badge badge-{{ $employee->status }}">
                                {{ $employee->status }}
                            </span>
                        </td>
                        <td class="actions">
                            <a href="{{ route('employees.edit', ['employee' => $employee->id, 'page' => $employees->currentPage()]) }}" class="btn-link">Edit</a>
                            <form action="{{ route('employees.destroy', $employee) }}" method="POST" class="inline-form"
                                onsubmit="return confirm('Delete this employee?');">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="page" value="{{ $employees->currentPage() }}">
                                <button type="submit" class="btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="empty">No employees found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if ($employees->hasPages())
        <nav class="pagination">
            @if ($employees->onFirstPage())
                <span class="pagination-btn disabled">&laquo; Prev</span>
            @else
                <a href="{{ $employees->previousPageUrl() }}" class="pagination-btn">&laquo; Prev</a>
            @endif

            @foreach ($employees->getUrlRange(1, $employees->lastPage()) as $page => $url)
                @if ($page === $employees->currentPage())
                    <span class="pagination-btn active">{{ $page }}</span>
                @else
                    <a href="{{ $url }}" class="pagination-btn">{{ $page }}</a>
                @endif
            @endforeach

            @if ($employees->hasMorePages())
                <a href="{{ $employees->nextPageUrl() }}" class="pagination-btn">Next &raquo;</a>
            @else
                <span class="pagination-btn disabled">Next &raquo;</span>
            @endif
        </nav>

        <p class="pagination-info">
            Showing {{ $employees->firstItem() }}–{{ $employees->lastItem() }} of {{ $employees->total() }} employees
        </p>
    @endif
</div>
@endsection
