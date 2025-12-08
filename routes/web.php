<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth'])->group(function () {
    
    Route::get('/dashboard', function () {
        $user = auth()->user();
        if ($user->hasRole('admin')) return redirect()->route('admin.dashboard');
        if ($user->hasRole('teacher')) return redirect()->route('teacher.dashboard');
        if ($user->hasRole('student')) return redirect()->route('student.dashboard');
        return abort(403, 'Unauthorized action.');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Admin Routes
    Route::middleware(['role:admin'])->group(function () {
        Route::view('/admin/dashboard', 'admin.dashboard')->name('admin.dashboard');
        Route::resource('students', StudentController::class);
        Route::resource('teachers', TeacherController::class);
        Route::resource('classes', \App\Http\Controllers\ClassController::class);
    });

    // Teacher Routes
    Route::middleware(['role:teacher'])->group(function () {
        Route::get('/teacher/dashboard', function () {
            $teacher = auth()->user()->teacher;
            $classes = $teacher ? $teacher->classes : collect();
            return view('teacher.dashboard', compact('classes'));
        })->name('teacher.dashboard');
    });

    // Student Routes
    Route::middleware(['role:student'])->group(function () {
        Route::get('/student/dashboard', function () {
            $student = auth()->user()->student;
            $classes = $student ? $student->classes : collect();
            return view('student.dashboard', compact('classes'));
        })->name('student.dashboard');
    });
});


require __DIR__.'/auth.php';