@extends('layouts.user')

@section('title', 'Dashboard')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow">
        <h2 class="text-2xl font-semibold mb-4">Welcome, {{ auth()->user()->name }}!</h2>
        <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
    </div>
@endsection
