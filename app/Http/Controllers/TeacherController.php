<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = Teacher::latest()->paginate(10);
        return view('admin.teachers.index', compact("teachers"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.teachers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'full_name'  => 'required|string|max:255',
                'email'      => 'required|email|unique:teachers,email|unique:users,email',
                'phone'      => 'nullable|string|max:20',
                'subject'    => 'required|string|max:255',
                'date_of_birth' => 'nullable|date',
                'qualification' => 'nullable|string|max:255',
                'address'    => 'nullable|string|max:500',
                'gender'    => 'required|in:male,female',
                'hired_at'  => 'required|date',
                'status'    => 'required|in:active,on_leave,inactive',
                'salary'    => 'required|numeric|min:0',
            ]
            );

            // Create User Account
            $user = User::create([
                'name' => $validated['full_name'],
                'email' => $validated['email'],
                'password' => Hash::make('password'), // Default password
            ]);
            $user->assignRole('teacher');

            $validated['user_id'] = $user->id;
            Teacher::create($validated);
            
            return redirect()->route('teachers.index')->with('success', 'Teacher and User Account created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        return view('admin.teachers.show', compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teacher)
    {
        return view(('admin.teachers.edit'), compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teacher $teacher)
    {
        $validated = $request->validate(
            [
                'full_name'  => 'required|string|max:255',
                'email'      => 'nullable|email|unique:teachers,email,' .$teacher->id,
                'phone'      => 'nullable|string|max:20',
                'subject'    => 'required|string|max:255',
                'date_of_birth' => 'nullable|date',
                'qualification' => 'nullable|string|max:255',
                'address'    => 'nullable|string|max:500',
                'gender'    => 'required|in:male,female',
                'hired_at'  => 'required|date',
                'status'    => 'required|in:active,on_leave,inactive',
                'salary'    => 'required|numeric|min:0',
            ]
            );
            $teacher->update($validated);
            return redirect()->route('teachers.index')->with('success', 'Teacher updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return redirect()->route('teachers.index')->with('success', 'Teacher deleted!');
    }
}
