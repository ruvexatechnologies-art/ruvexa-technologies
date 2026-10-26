<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        // 🔒 SECURITY: Defense-in-depth. Ensure user is authenticated.
        if (!auth()->check()) {
            return redirect()->route('login')->withErrors(['email' => 'Please log in to access the dashboard.']);
        }

        // Real Data
        $totalInquiries = Contact::count();
        $totalUsers = User::count();
        $recentInquiries = Contact::latest()->take(5)->get();
        
        // UI Mock Data (To make the dashboard look full and enterprise-ready)
        $activeProjects = 12; 
        $revenue = "$24,500";

        return view('dashboard.index', compact('totalInquiries', 'totalUsers', 'recentInquiries', 'activeProjects', 'revenue'));
    }
}