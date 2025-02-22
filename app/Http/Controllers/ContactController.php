<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactMessage; // Import the model if saving to the database

class ContactController extends Controller
{
    // Show the contact form
    public function showForm()
    {
        return view('contact'); // Make sure this matches your contact page view
    }

    public function about()
    {
        return view('about'); // about.blade.php
    }

    // Handle form submission
    public function submitForm(Request $request)
    {
        // Validate form data
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // Optional: Save the message to the database
        ContactMessage::create($data); // Uncomment this if you have a ContactMessage model

        // Redirect back with a success message
        return redirect()->route('contact')->with('success', 'Your message has been sent!');
    }
}
