<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    /**
     * Display the landing page.
     */
    public function index()
    {
        $courses = [];
        $categories = [];

        return view('home', compact('courses', 'categories'));
    }
}
