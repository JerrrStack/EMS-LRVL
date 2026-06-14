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

    public function index(Request $request)
    {
        $search = $request->input('search');

        $employees = Employee::query()
            ->when($search, function ($query, $search) {
                $query->where(function ($query) use ($search) {
                    $query->where('first_name', 'like', "%{$search}%")
                        ->orWhere('last_name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%")
                        ->orWhere('employee_no', 'like', "%{$search}%")
                        ->orWhere('position', 'like', "%{$search}%");
                });
            })
            ->orderBy('id')
            ->paginate(self::PER_PAGE)
            ->withQueryString();

        return view('dashboard', compact('employees', 'search'));
    }

    public function create()
    {
        $departments = Department::orderBy('department_name')->get();

        return view('employees.create', compact('departments'));
    }

    public function store(StoreEmployeeRequest $request)
    {
        Employee::create($request->validated());

        return redirect()->route('employees.index')
            ->with('success', 'Employee registered successfully.');
    }

    public function edit(Employee $employee)
    {
        $departments = Department::orderBy('department_name')->get();
        $currentPage = max(1, (int) request('page', 1));
        $search = request('search');

        return view('employees.edit', compact('employee', 'departments', 'currentPage', 'search'));
    }

    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $currentPage = max(1, (int) $request->input('page', 1));

        $employee->update($request->validated());

        return redirect()->route('employees.index', array_filter([
            'page' => $currentPage,
            'search' => $request->input('search'),
        ]))->with('success', 'Employee updated successfully.');
    }

    public function destroy(Request $request, Employee $employee)
    {
        $currentPage = max(1, (int) $request->input('page', 1));

        $employee->delete();

        return redirect()->route('employees.index', array_filter([
            'page' => $currentPage,
            'search' => $request->input('search'),
        ]))->with('success', 'Employee deleted successfully.');
    }
}
