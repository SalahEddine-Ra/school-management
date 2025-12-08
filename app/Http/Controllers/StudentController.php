<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::latest()->paginate(15);
        return view('admin.students.index', compact('students'));
    }

    public function create()
    {
        return view('admin.students.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name'  => 'required|string|max:255',
            'email'      => 'required|email|unique:students,email|unique:users,email',
            'phone'      => 'nullable|string|max:20',
            'age'        => 'required|integer|min:5|max:100',
            'address'    => 'required|string|max:500',
            'birth_date' => 'nullable|date',
            'gender'     => 'required|in:male,female',
        ]);

        // Create User Account
        $user = User::create([
            'name' => $validated['full_name'],
            'email' => $validated['email'],
            'password' => Hash::make('password'), // Default password
        ]);
        $user->assignRole('student');

        // Create Student Record linked to User
        $validated['user_id'] = $user->id;
        Student::create($validated);

        return redirect()->route('students.index')->with('success', 'Student and User Account created successfully!');
    }

    public function show(Student $student)
    {
        return view('admin.students.show', compact('student'));
    }

    public function edit(Student $student)
    {
        return view('admin.students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'full_name'  => 'required|string|max:255',
            'email'      => 'nullable|email|unique:students,email,'.$student->id,
            'phone'      => 'nullable|string|max:20',
            'age'        => 'required|integer|min:5|max:100',
            'address'    => 'required|string|max:500',
            'birth_date' => 'nullable|date',
            'gender'     => 'required|in:male,female,other',
        ]);

        $student->update($validated);

        return redirect()->route('students.index')->with('success', 'Student updated!');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted!');
    }
}