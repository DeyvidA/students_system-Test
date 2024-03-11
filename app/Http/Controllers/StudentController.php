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

    public function create()
    {
        return Inertia::render('Student/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'username' => 'required',
            'email' => 'required|email',
        ]);

        Student::create($request->all());
        return redirect()->route('dashboard');
    }

    public function edit(Student $student)
    {
        return Inertia::render('Student/Edit', [
            'student' => $student
        ]);
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'username' => 'required',
            'email' => 'required|email',
        ]);

        $student->update($request->all());
        return redirect()->route('dashboard');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('dashboard');
    }
}
