<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    // Show the Home Page
    public function home()
    {
        return view('home');
    }

    // Show the About Us Page
    public function about()
    {
        return view('about');
    }

    public function services()
    {
        return view('services');
    }
    
    public function portfolio()
    {
        return view('portfolio');
    }
}