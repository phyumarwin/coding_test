<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Company') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="mb-0">Edit Company</h1>
                    <hr/>
                    <p>
                        <a href="{{ route('company') }}" class="btn btn-primary">Go Back</a>
                    </p>

                    <form action="{{ route('company.update', $company->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <div class="col">
                                <input type="text" name="name" class="form-control" value="{{ old('name', $company->name) }}" required>
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <input type="email" name="email" class="form-control" value="{{ old('email', $company->email) }}" required>
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <input type="file" name="logo" class="form-control" placeholder="Company Logo">
                                @error('logo')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                @if ($company->logo)
                                    <img src="{{ asset('storage/' . $company->logo) }}" alt="Company Logo" width="100">
                                @endif
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <input type="url" name="website" class="form-control" value="{{ old('website', $company->website) }}">
                                @error('website')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="d-grid">
                                <button class="btn btn-primary" type="submit">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
