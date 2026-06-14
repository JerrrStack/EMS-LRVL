<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    private const PER_PAGE = 9;

    public function index()
    {
        $employees = Employee::orderBy('id')
            ->paginate(self::PER_PAGE);

        return view('dashboard', compact('employees'));
    }

    public function create()
    {
        $departments = Department::orderBy('department_name')->get();

        return view('employees.create', compact('departments'));
    }

    public function store(StoreEmployeeRequest $request)
    {
        Employee::create($request->validated());

        return redirect()->route('employees.index');
    }

    public function edit(Employee $employee)
    {
        $departments = Department::orderBy('department_name')->get();
        $currentPage = max(1, (int) request('page', 1));

        return view('employees.edit', compact('employee', 'departments', 'currentPage'));
    }

    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $currentPage = max(1, (int) $request->input('page', 1));

        $employee->update($request->validated());

        return redirect()->route('employees.index', ['page' => $currentPage]);
    }

    public function destroy(Request $request, Employee $employee)
    {
        $currentPage = max(1, (int) $request->input('page', 1));

        $employee->delete();

        return redirect()->route('employees.index', ['page' => $currentPage]);
    }
}
