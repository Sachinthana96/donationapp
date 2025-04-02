<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactMessage; // Import the model if saving to the database
use App\Models\Project;

class ContactController extends Controller
{
    // Show the contact form
    public function showForm()
    {
        return view('contact');
    }

    public function about()
    {
        return view('about');
    }
    public function project()
    {
        $projects = Project::with('items')->get();
        return view('project', ['projects' => $projects]);
    }

    // Handle form submission
    public function submitForm(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        ContactMessage::create($data);

        return redirect()->route('contact')->with('success', 'Your message has been sent!');
    }
}
