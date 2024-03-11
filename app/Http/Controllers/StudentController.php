<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    // index method to display all students
    public function index()
    {
        $students = Student::all();
        return Inertia::render('Student/Index', [
            'students' => $students
        ]);
    }

}
