<x-app-layout>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-10">
                <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-10">Student Details</h1>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 text-lg">
                    <div>
                        <p class="text-gray-600 dark:text-gray-400">Full Name</p>
                        <p class="font-semibold text-2xl dark:text-white">{{ $student->full_name }}</p>
                    </div>
                    <div>
                        <p class="text-gray-600 dark:text-gray-400">Email</p>
                        <p class="font-semibold text-2xl dark:text-white">{{ $student->email ?? '—' }}</p>
                    </div>
                    <div>
                        <p class="text-gray-600 dark:text-gray-400">Age</p>
                        <p class="font-semibold text-2xl dark:text-white">{{ $student->age }}</p>
                    </div>
                    <div>
                        <p class="text-gray-600 dark:text-gray-400">Gender</p>
                        <p class="font-semibold text-2xl capitalize dark:text-white">{{ $student->gender }}</p>
                    </div>
                    <div class="md:col-span-2">
                        <p class="text-gray-600 dark:text-gray-400">Address</p>
                        <p class="font-semibold text-2xl dark:text-white">{{ $student->address }}</p>
                    </div>
                    <div>
                        <p class="text-gray-600 dark:text-gray-400">Birth Date</p>
                        <p class="font-semibold text-2xl dark:text-white">{{ $student->birth_date?->format('d/m/Y') ?? '—' }}</p>
                    </div>
                </div>

                <div class="mt-12 flex gap-4">
                    <a href="{{ route('students.edit', $student) }}" 
                       class="bg-yellow-600 hover:bg-yellow-700 text-white font-bold py-3 px-8 rounded-lg">
                        Edit Student
                    </a>
                    <a href="{{ route('students.index') }}" class="text-gray-600 hover:text-yellow-600 py-3 px-8">
                        ← Back to List
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>