<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="flex justify-between items-center mb-8">
                        <h1 class="text-4xl font-bold">All Students</h1>
                        <div class="flex gap-6">
                            <a href="{{ route('students.create') }}" 
                                class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg">
                                    + Add New Student
                            </a>
                            <a href="{{ route('dashboard') }}" class="text-blue-600 text-center pt-2 hover:underline ">Back to Dashboard</a>
                        </div>
                    </div>

                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-6 py-4 rounded mb-6">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if($students->count() === 0)
                        <p class="text-xl text-gray-600">No students yet. Add the first one!</p>
                    @else
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-300">
                                <thead class="bg-gray-50 dark:bg-gray-700">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Age</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Gender</th>
                                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200">
                                    @foreach($students as $student)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $student->full_name }}</td>
                                            <td class="px-6 py-4">{{ $student->email ?? '-' }}</td>
                                            <td class="px-6 py-4">{{ $student->age }}</td>
                                            <td class="px-6 py-4 capitalize">{{ $student->gender }}</td>
                                            <td class="px-6 py-4 text-right space-x-4">
                                                <div class="flex justify-end gap-4 ">  
                                                        <div class="bg-indigo-600 hover:bg-indigo-800 w-fit py-1 px-3 rounded" ><a href="{{ route('students.show', $student) }}" class="text-white">View</a></div>
                                                    <div class="bg-green-600 hover:bg-green-800 w-fit py-1 px-3 rounded" ><a href="{{ route('students.edit', $student) }}" class="text-white">Edit</a></div>
                                                    <form method="POST" action="{{ route('students.destroy', $student) }}" class="inline">
                                                        @csrf @method('DELETE')
                                                        <div class="bg-red-600 hover:bg-red-800 w-fit py-1 px-3 rounded" >
                                                            <button type="submit" onclick="return confirm('Delete this student?')" 
                                                                class="text-white">Delete</button>
                                                        </div>
                                                        
                                                    </form>
                                                </div>
                                                
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-8">
                            {{ $students->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>