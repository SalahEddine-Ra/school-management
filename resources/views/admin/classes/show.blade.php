<x-app-layout>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-10">
                <div class="flex justify-between items-start mb-10">
                    <div>
                        <h1 class="text-4xl font-bold text-gray-900 dark:text-white">{{ $class->name }}</h1>
                        <p class="text-gray-600 dark:text-gray-400 mt-2">{{ $class->description }}</p>
                    </div>
                    <a href="{{ route('classes.edit', $class) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded">
                        Edit Class
                    </a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200 mb-4">Teachers ({{ $class->teachers->count() }})</h2>
                        @if($class->teachers->isEmpty())
                            <p class="text-gray-500">No teachers assigned.</p>
                        @else
                            <ul class="list-disc list-inside space-y-2">
                                @foreach($class->teachers as $teacher)
                                    <li class="text-gray-700 dark:text-gray-300">
                                        <a href="{{ route('teachers.show', $teacher) }}" class="hover:underline text-blue-600">
                                            {{ $teacher->full_name }}
                                        </a>
                                        <span class="text-sm text-gray-500">({{ $teacher->subject }})</span>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>

                    <div>
                        <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200 mb-4">Students ({{ $class->students->count() }})</h2>
                        @if($class->students->isEmpty())
                            <p class="text-gray-500">No students assigned.</p>
                        @else
                            <ul class="list-disc list-inside space-y-2">
                                @foreach($class->students as $student)
                                    <li class="text-gray-700 dark:text-gray-300">
                                        <a href="{{ route('students.show', $student) }}" class="hover:underline text-blue-600">
                                            {{ $student->full_name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>

                <div class="mt-12">
                    <a href="{{ route('classes.index') }}" class="text-gray-600 hover:text-blue-600">
                        &larr; Back to All Classes
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
