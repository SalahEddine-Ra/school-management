<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100">
                        Welcome, {{ auth()->user()->name }}!
                    </h1>
                    <p class="mt-2 text-gray-600 dark:text-gray-300">
                        Here are the classes you are teaching.
                    </p>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-xl font-semibold mb-4">My Classes</h2>
                    
                    @if($classes->isEmpty())
                        <p class="text-gray-500">You are not assigned to any classes yet.</p>
                    @else
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            @foreach($classes as $class)
                                <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-4 hover:shadow-md transition">
                                    <h3 class="text-lg font-bold text-indigo-600 dark:text-indigo-400">{{ $class->name }}</h3>
                                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                                        {{ $class->description ?? 'No description' }}
                                    </p>
                                    <div class="mt-4 flex justify-between items-center text-sm">
                                        <span class="bg-gray-100 dark:bg-gray-700 px-2 py-1 rounded">
                                            {{ $class->students->count() }} Students
                                        </span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
