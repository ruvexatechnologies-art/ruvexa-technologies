<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail; // Added for Email Security / Notifications

class ContactController extends Controller
{
    // Show the contact page
    public function index()
    {
        return view('contact');
    }

    // Handle the form submission
    public function store(Request $request)
    {
        // 1. Validate the incoming data (SECURED)
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'phone'   => 'nullable|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
            // Honeypot Security: Bots will fill this field, humans won't.
            'website' => 'nullable|prohibited', 
        ]);

        // 2. Save to database
        Contact::create($validated);

        // 3. Email Notification (Sends instantly to your Ruvexa inbox)
        try {
            Mail::raw(
                "New Inquiry from: {$validated['name']}\n" .
                "Email: {$validated['email']}\n" .
                "Phone: {$validated['phone']}\n\n" .
                "Message:\n{$validated['message']}", 
                function ($message) use ($validated) {
                    $message->to('ruvexatechnologies@gmail.com')
                            ->subject('New Ruvexa Inquiry: ' . $validated['subject']);
                }
            );
        } catch (\Exception $e) {
            // Silently fail if email fails, but the DB is saved.
            // Log it so you can debug later without breaking the user experience.
            \Log::error('Email failed: ' . $e->getMessage());
        }

        // 4. Redirect back with a success message
        return redirect()->back()->with('success', 'Thank you! Your message has been sent successfully.');
    }
}