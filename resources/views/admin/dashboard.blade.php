<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Company') }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="man-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="d-flex align-items-center justify-content-between">
                        <a href="{{ route('company') }}">Company List</a>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <a href="{{ route('employee') }}">Employee List</a>
                    </div>
                    
                    <hr/>
                    @if (Session::has('success'))
                        <div class="alert alert-success" role="alert">{{ Session::get('success') }}</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>