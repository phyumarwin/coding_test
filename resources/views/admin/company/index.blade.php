<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Company') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h1 class="mb-0">List Company</h1>
                        <a href="{{ route('company.create') }}" class="btn btn-primary">Add Company</a>
                    </div>

                    <form action="{{ route('company') }}" method="GET" class="mb-4">
                        <div class="input-group">
                            <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Search by name, email, or website">
                            <button class="btn btn-outline-secondary" type="submit">Search</button>
                        </div>
                    </form>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Logo</th>
                                <th>Website</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($companies as $company) <!-- Use forelse to handle empty data -->
                                <tr>
                                    <td>{{ $company->name }}</td>
                                    <td>{{ $company->email }}</td>
                                    <td>
                                        @if($company->logo)
                                            <img src="{{ $company->logo }}" alt="{{ $company->name }}" style="width: 50px; height: auto;">
                                        @else
                                            No Logo
                                        @endif
                                    </td>
                                    <td>{{ $company->website }}</td>
                                    <td>
                                        <a href="{{ route('company.edit', $company->id) }}" class="btn btn-success btn-sm">Edit</a>
                                        
                                        <form action="{{ route('company.destroy', $company->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">No companies found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <!-- Pagination Links -->
                    <div class="mt-4">
                        {{ $companies->links() }} <!-- Add this line for pagination -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
