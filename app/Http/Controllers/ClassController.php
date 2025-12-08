<?php

namespace App\Http\Controllers;

use App\Models\SchoolClass;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function index()
    {
        $classes = SchoolClass::withCount(['students', 'teachers'])->latest()->paginate(10);
        return view('admin.classes.index', compact('classes'));
    }

    public function create()
    {
        $students = Student::all();
        $teachers = Teacher::all();
        return view('admin.classes.create', compact('students', 'teachers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
            'students' => 'array',
            'students.*' => 'exists:students,id',
            'teachers' => 'array',
            'teachers.*' => 'exists:teachers,id',
        ]);

        $class = SchoolClass::create([
            'name' => $validated['name'],
            'description' => $validated['description'] ?? null,
        ]);

        if (isset($validated['students'])) {
            $class->students()->sync($validated['students']);
        }

        if (isset($validated['teachers'])) {
            $class->teachers()->sync($validated['teachers']);
        }

        return redirect()->route('classes.index')->with('success', 'Class created successfully!');
    }

    public function show(SchoolClass $class)
    {
        $class->load(['students', 'teachers']);
        return view('admin.classes.show', compact('class'));
    }

    public function edit(SchoolClass $class)
    {
        $students = Student::all();
        $teachers = Teacher::all();
        $class->load(['students', 'teachers']);
        return view('admin.classes.edit', compact('class', 'students', 'teachers'));
    }

    public function update(Request $request, SchoolClass $class)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
            'students' => 'array',
            'students.*' => 'exists:students,id',
            'teachers' => 'array',
            'teachers.*' => 'exists:teachers,id',
        ]);

        $class->update([
            'name' => $validated['name'],
            'description' => $validated['description'] ?? null,
        ]);

        if (isset($validated['students'])) {
            $class->students()->sync($validated['students']);
        } else {
            $class->students()->detach();
        }

        if (isset($validated['teachers'])) {
            $class->teachers()->sync($validated['teachers']);
        } else {
            $class->teachers()->detach();
        }

        return redirect()->route('classes.index')->with('success', 'Class updated successfully!');
    }

    public function destroy(SchoolClass $class)
    {
        $class->delete();
        return redirect()->route('classes.index')->with('success', 'Class deleted!');
    }
}
