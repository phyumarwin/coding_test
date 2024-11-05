<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Employee') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="mb-0">Edit Employee</h1>
                    <hr/>
                    <p>
                        <a href="{{ route('employee') }}" class="btn btn-primary">Go Back</a>
                    </p>

                    <form action="{{ route('employee.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <div class="col">
                                <input type="text" name="name" class="form-control" value="{{ $employee->name }}" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <input type="email" name="email" class="form-control" value="{{ $employee->email }}" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <input type="text" name="phone" class="form-control" value="{{ $employee->phone }}" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <input type="file" name="profile" class="form-control" placeholder="Profile Picture">
                                @if ($employee->profile)
                                    <img src="{{ asset('storage/' . $employee->profile) }}" alt="Profile" width="50" class="mt-2">
                                @endif
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <select name="company_id" class="form-control" required>
                                    <option value="">Select Company</option>
                                    @foreach ($companies as $company)
                                        <option value="{{ $company->id }}" {{ $employee->company_id == $company->id ? 'selected' : '' }}>{{ $company->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="d-grid">
                                <button class="btn btn-primary" type="submit">Update Employee</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
