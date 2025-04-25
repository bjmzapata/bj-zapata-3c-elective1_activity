<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class StudentController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $students = Student::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%$search%");
        })->get();
    
        return view('students.index', compact('students', 'search'));
    }
    
    public function create()
    {
        return view('students.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'course' => 'required',
            'year_level' => 'required',
        ]);
    
        Student::create($request->all());
        return redirect()->route('students.index')->with('success', 'Student added.');
    }
    
    public function show(Student $student)
    {
        $qrData = "Name: $student->name\nEmail: $student->email\nCourse: $student->course\nYear Level: $student->year_level";
        $qrCode = QrCode::size(200)->generate($qrData);
        return view('students.show', compact('student', 'qrCode'));
    }
    
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }
    
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'course' => 'required',
            'year_level' => 'required',
        ]);
    
        $student->update($request->all());
        return redirect()->route('students.index')->with('success', 'Student updated.');
    }
    
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted.');
    }
    
}
