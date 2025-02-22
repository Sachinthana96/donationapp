@extends('layouts.admin')

@section('content')


<div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Admin Dashboard") }}
                </div>
            </div>
        </div>
    </div>
  
     <!-- Grid Layout for Sub Bars -->
     <div class="max-w-5xl mx-auto mt-4">
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3 gap-6 text-center">

            <a href="{{ route('admin.users') }}" class="tw-block"><div class="bg-gray-200 p-6 rounded-lg shadow-md font-semibold">Project Management</div>
            <a href="{{ route('admin.users') }}" class="tw-block"><div class="bg-gray-200 p-6 rounded-lg shadow-md font-semibold">Admin & User Management</div></a>
            <a href="{{ route('admin.users') }}" class="tw-block"><div class="bg-gray-200 p-6 rounded-lg shadow-md font-semibold">Donation Tracking</div>
            <a href="{{ route('admin.users') }}" class="tw-block"><div class="bg-gray-200 p-6 rounded-lg shadow-md font-semibold">Financial Reports</div>
            <a href="{{ route('admin.users') }}" class="tw-block"><div class="bg-gray-200 p-6 rounded-lg shadow-md font-semibold">Transactions</div>
            <a href="{{ route('admin.users') }}" class="tw-block"><div class="bg-gray-200 p-6 rounded-lg shadow-md font-semibold">System Settings</div>
        
        </div>
    </div>
</div>

@endsection
