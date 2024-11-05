<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Employee List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h1 class="mb-0">Employees</h1>
                        <a href="{{ route('employee.create') }}" class="btn btn-primary">Add Employee</a>
                    </div>

                     <!-- Search Form -->
                     <form action="{{ route('employee') }}" method="GET" class="mb-4">
                        <div class="input-group">
                            <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Search by name, email, or phone">
                            <button class="btn btn-outline-secondary" type="submit">Search</button>
                        </div>
                    </form>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Company</th>
                                <th>Profile</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employees as $employee)
                                <tr>
                                    <td>{{ $employee->name }}</td>
                                    <td>{{ $employee->email }}</td>
                                    <td>{{ $employee->phone }}</td>
                                    <td>{{ $employee->company->name }}</td>
                                    <td>
                                        @if ($employee->profile)
                                            <img src="{{ asset('storage/' . $employee->profile) }}" alt="Profile" width="50">
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('employee.edit', $employee->id) }}" class="btn btn-success">Edit</a>
                                        <form action="{{ route('employee.destroy', $employee->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this employee?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Pagination Links -->
                    <div class="mt-4">
                        {{ $employees->links() }} <!-- Add this line for pagination -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
