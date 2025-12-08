<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="mb-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                        <div>
                            <h1 class="text-2xl sm:text-3xl font-extrabold text-gray-900 dark:text-gray-100">
                                Welcome, {{ auth()->user()->name }}!
                            </h1>
                            <p class="mt-2 text-sm sm:text-base text-gray-600 dark:text-gray-300">
                                Overview of your school — quick stats and quick links.
                            </p>
                        </div>

                        <div class="flex gap-3">
                            <a href="{{ route('students.index') }}"
                               class="inline-flex items-center gap-2 bg-gradient-to-br from-blue-500 to-blue-600 focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 text-white font-semibold py-2 px-4 rounded-md transition">
                                Manage Students
                            </a>

                            <a href="{{ route('teachers.index') }}"
                               class="inline-flex items-center gap-2 bg-gradient-to-br from-green-500 to-green-600 focus:ring-2 focus:ring-offset-2 focus:ring-green-500 text-white font-semibold py-2 px-4 rounded-md transition">
                                Manage Teachers
                            </a>

                            <a href="{{ route('classes.index') }}"
                               class="inline-flex items-center gap-2 bg-gradient-to-br from-purple-500 to-purple-600 focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 text-white font-semibold py-2 px-4 rounded-md transition">
                                Manage Classes
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stats grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Students card -->
                <div class="bg-gradient-to-br from-blue-500 to-blue-600 text-white p-6 rounded-lg shadow-lg transform hover:translate-y-[-3px] transition">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-3xl sm:text-4xl font-extrabold leading-none">{{ \App\Models\Student::count() }}</p>
                            <p class="mt-2 text-sm sm:text-base opacity-90">Total Students</p>
                        </div>
                        <div class="bg-white/20 p-3 rounded-full">
                            <!-- simple student icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 14c3.866 0 7 1.79 7 4v1H5v-1c0-2.21 3.134-4 7-4z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 7a3 3 0 100-6 3 3 0 000 6z" transform="translate(0 5)"/>
                            </svg>
                        </div>
                    </div>

                    <div class="mt-6 flex gap-3">
                        <a href="{{ route('students.create') }}" class="inline-block bg-white/20 hover:bg-white/30 text-white py-2 px-3 rounded-md text-sm font-medium transition">
                            Add Student
                        </a>
                        <a href="{{ route('students.index') }}" class="inline-block bg-white/10 hover:bg-white/20 text-white py-2 px-3 rounded-md text-sm font-medium transition">
                            View All
                        </a>
                    </div>
                </div>

                <!-- Teachers card -->
                <div class="bg-gradient-to-br from-green-500 to-green-600 text-white p-6 rounded-lg shadow-lg transform hover:translate-y-[-3px] transition">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-3xl sm:text-4xl font-extrabold leading-none">{{ \App\Models\Teacher::count() }}</p>
                            <p class="mt-2 text-sm sm:text-base opacity-90">Total Teachers</p>
                        </div>
                        <div class="bg-white/20 p-3 rounded-full">
                            <!-- simple teacher icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 2l8 4-8 4-8-4 8-4z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 10v6a8 8 0 008 8 8 8 0 008-8v-6" />
                            </svg>
                        </div>
                    </div>

                    <div class="mt-6 flex gap-3">
                        <a href="{{ route('teachers.create') }}" class="inline-block bg-white/20 hover:bg-white/30 text-white py-2 px-3 rounded-md text-sm font-medium transition">
                            Add Teacher
                        </a>
                        <a href="{{ route('teachers.index') }}" class="inline-block bg-white/10 hover:bg-white/20 text-white py-2 px-3 rounded-md text-sm font-medium transition">
                            View All
                        </a>
                    </div>
                </div>

                <!-- Classes card -->
                <div class="bg-gradient-to-br from-purple-500 to-purple-600 text-white p-6 rounded-lg shadow-lg transform hover:translate-y-[-3px] transition">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-3xl sm:text-4xl font-extrabold leading-none">{{ \App\Models\SchoolClass::count() }}</p>
                            <p class="mt-2 text-sm sm:text-base opacity-90">Total Classes</p>
                        </div>
                        <div class="bg-white/20 p-3 rounded-full">
                            <!-- simple class icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                        </div>
                    </div>

                    <div class="mt-6 flex gap-3">
                        <a href="{{ route('classes.create') }}" class="inline-block bg-white/20 hover:bg-white/30 text-white py-2 px-3 rounded-md text-sm font-medium transition">
                            Add Class
                        </a>
                        <a href="{{ route('classes.index') }}" class="inline-block bg-white/10 hover:bg-white/20 text-white py-2 px-3 rounded-md text-sm font-medium transition">
                            View All
                        </a>
                    </div>
                </div>
            </div>

            
        </div>
    </div>
</x-app-layout>
