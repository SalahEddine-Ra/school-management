<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'role' => \Spatie\Permission\Middleware\RoleMiddleware::class,
        ]);

        $middleware->redirectTo(function ($request) {
            if (! $request->user()) {
                return route('login');
            }

            return match (true) {
                $request->user()->hasRole('admin')   => route('admin.dashboard'),
                $request->user()->hasRole('teacher') => route('teacher.dashboard'),
                $request->user()->hasRole('student') => route('student.dashboard'),
                default                              => route('dashboard'),
            };
        });
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })
    ->create();
