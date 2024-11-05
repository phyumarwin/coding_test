<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Requests\CompanyRequest;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $companies = Company::when($search, function ($query) use ($search) {
            $query->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('website', 'like', "%{$search}%");
        })->paginate(10);
        return view('admin.company.index', compact('companies'));
    }

    public function create()
    {
        return view('admin.company.create');
    }

    public function store(CompanyRequest $request)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logos', 'public');
            $validatedData['logo'] = $logoPath;
        }
        $company = Company::create($validatedData);
        return redirect()->route('company')->with('success', 'Company created successfully!');
    }

    public function edit($id)
    {
        $company = Company::findOrFail($id);

        return view('admin.company.edit', compact('company'));
    }

    public function update(CompanyRequest $request, $id)
    {
        $company = Company::findOrFail($id);
        $validatedData = $request->validated();

        if ($request->hasFile('logo')) {
            if ($company->logo) {
                Storage::disk('public')->delete($company->logo);
            }
            $logoPath = $request->file('logo')->store('logos', 'public');
            $validatedData['logo'] = $logoPath;
        } else {
            $validatedData['logo'] = $company->logo;
        }

        $company->update($validatedData);

        return redirect()->route('company')->with('success', 'Company updated successfully!');
    }

    public function destroy($id)
    {
        $company = Company::findOrFail($id); // This will throw a 404 if not found

        if ($company->logo) {
            Storage::disk('public')->delete($company->logo);
        }
        $company->delete();
        return redirect()->route('company')->with('success', 'Company deleted successfully!');
    }
}
