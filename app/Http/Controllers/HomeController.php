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
        $courses    = CoursesData::getCourses();
        $categories = CoursesData::getCategories();

        $modalityColors = [
            'Online'      => '#2CB7FF',
            'En Vivo'     => '#704EFD',
            'Presencial'  => '#FFA927',
        ];

        return view('home', compact('courses', 'categories', 'modalityColors'));
    }
}
