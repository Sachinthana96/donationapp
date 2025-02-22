<!-- About Page -->
@extends('layouts.public')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-4xl font-bold text-center text-gray-800 mb-6">Who We Are</h1>
    <p class="text-lg text-center text-gray-600 mb-8">
        Empowering people with donations. Access to the right support is crucial when facing
        challenges today and tomorrow. With our platform, it's never been easier to make a difference.
    </p>

    <div class="grid md:grid-cols-3 gap-8 text-center">
        <div>
            <h2 class="text-2xl font-semibold text-gray-700">Founded</h2>
            <p class="text-lg text-gray-600">2024</p>
        </div>
        <div>
            <h2 class="text-2xl font-semibold text-gray-700">Volunteers</h2>
            <p class="text-lg text-gray-600">1,500+</p>
        </div>
        <div>
            <h2 class="text-2xl font-semibold text-gray-700">Donors</h2>
            <p class="text-lg text-gray-600">10,000+</p>
        </div>
    </div>

    <h2 class="text-3xl font-bold text-center text-gray-800 mt-12">Our Mission</h2>
    <p class="text-lg text-center text-gray-600 mt-4">
        We strive to provide support and aid to those in need through a strong network of donors and volunteers.
    </p>

    <h2 class="text-3xl font-bold text-center text-gray-800 mt-12">Our Services</h2>
    <div class="grid md:grid-cols-2 gap-8 mt-6">
        <div class="bg-white p-6 shadow-lg rounded-lg text-center">
            <h3 class="text-2xl font-semibold text-gray-700">Food & Essentials</h3>
            <p class="text-lg text-gray-600">Providing food, clothing, and essential supplies to those in need.</p>
        </div>
        <div class="bg-white p-6 shadow-lg rounded-lg text-center">
            <h3 class="text-2xl font-semibold text-gray-700">Educational Support</h3>
            <p class="text-lg text-gray-600">Helping underprivileged children gain access to education.</p>
        </div>
    </div>

    <h2 class="text-3xl font-bold text-center text-gray-800 mt-12">Why Choose Us?</h2>
    <div class="grid md:grid-cols-3 gap-8 mt-6">
        <div class="bg-white p-6 shadow-lg rounded-lg text-center">
            <h3 class="text-2xl font-semibold text-gray-700">Transparency</h3>
            <p class="text-lg text-gray-600">100% of donations go directly to beneficiaries.</p>
        </div>
        <div class="bg-white p-6 shadow-lg rounded-lg text-center">
            <h3 class="text-2xl font-semibold text-gray-700">Impact</h3>
            <p class="text-lg text-gray-600">Every contribution makes a measurable difference.</p>
        </div>
        <div class="bg-white p-6 shadow-lg rounded-lg text-center">
            <h3 class="text-2xl font-semibold text-gray-700">Community</h3>
            <p class="text-lg text-gray-600">Join thousands of volunteers making a change.</p>
        </div>
    </div>
</div>
@endsection