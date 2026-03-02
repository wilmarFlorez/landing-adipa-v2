<?php

namespace App\Http\Controllers;

use App\Data\CoursesData;

class HomeController extends Controller
{
    /**
     * Display the landing page.
     */
    public function index()
    {
        $courses        = CoursesData::getCourses();
        $categories     = CoursesData::getCategories();
        $modalityColors = CoursesData::getModalityColors();

        return view('home', compact('courses', 'categories', 'modalityColors'));
    }
}
