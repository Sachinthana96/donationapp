<!-- contact Page -->
@extends('layouts.public')

@section('content')                
    <div class="relative bg-cover bg-center text-white py-20"style="background-image: url('{{ asset('images/contact.jpg') }}');         background-color: rgba(0, 0, 0, 0.4);">        
    <div class="container mx-auto flex flex-col md:flex-row items-center px-6">
            <!-- Left Side (Contact Info) -->
            <div class="w-full md:w-2/3 text-center md:text-left px-4">
                <h1 class="text-3xl font-semibold mb-6">Contact Us</h1>
                <p class="mb-6">We're here to help! Reach out to us for any questions or support.Let me know if you'd like a different vibe!</p>
                
                <div class="mb-4">
                    <strong>Address:</strong><br>
                    Miriswatta, 
                    Gampaha, 
                    Sri Lanka
                </div>
                <div class="mb-4">
                    <strong>Phone:</strong><br>
                    +94 76 771 3102
                </div>
                <div class="mb-4">
                    <strong>Email:</strong><br>
                    <a href="mailto:sachinthanaperera.info@gmail.com" class="text-blue-300">sachinthanaperera.info@gmail.com</a>
                </div>
            </div>

            <!-- Right Side (Contact Form) -->
            <div class="w-full md:w-1/3 bg-white text-gray-800 p-6 rounded-lg shadow-lg px-4">
                <h2 class="text-2xl font-semibold mb-4">Send Message</h2>
                <form action="{{ route('contact.submit') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium">Full Name</label>
                        <input type="text" id="name" name="name" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm" required>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium">Email</label>
                        <input type="email" id="email" name="email" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm" required>
                    </div>
                    <div class="mb-4">
                        <label for="message" class="block text-sm font-medium">Message</label>
                        <textarea id="message" name="message" rows="4" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm" required></textarea>
                    </div>
                    <button type="submit" class="w-500 px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-green-600 relative z-10">Send</button>
                </form>
            </div>
        </div>
    </div>
    @endsection

