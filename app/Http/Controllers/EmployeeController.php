<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Requests\EmployeeRequest;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $employees = Employee::when($search, function ($query) use ($search) {
            $query->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%");
        })->paginate(10);
        return view('admin.employee.index', compact('employees'));
    }

    public function create()
    {
        $companies = Company::all();
        return view('admin.employee.create', compact('companies'));
    }

    public function store(EmployeeRequest $request)
    {
        $validatedData = $request->validated();
        
        if ($request->hasFile('profile')) {
            $validatedData['profile'] = $request->file('profile')->store('profiles', 'public');
        }

        Employee::create($validatedData);

        return redirect()->route('employee')->with('success', 'Employee added successfully!');
    }

    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        $companies = Company::all(); 
        return view('admin.employee.edit', compact('employee', 'companies'));
    }

    public function update(EmployeeRequest $request, $id)
    {
        $employee = Employee::findOrFail($id);
        $validatedData = $request->validated();

        if ($request->hasFile('profile')) {
            // Delete the old profile image if it exists
            if ($employee->profile) {
                Storage::disk('public')->delete($employee->profile);
            }
            $validatedData['profile'] = $request->file('profile')->store('profiles', 'public');
        } else {
            // Keep the old profile image if no new one was uploaded
            $validatedData['profile'] = $employee->profile;
        }

        $employee->update($validatedData);

        return redirect()->route('employee')->with('success', 'Employee updated successfully!');
    }

    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);

        // Delete the profile image if it exists
        if ($employee->profile) {
            Storage::disk('public')->delete($employee->profile);
        }

        $employee->delete();

        return redirect()->route('employee')->with('success', 'Employee deleted successfully!');
    }
}
