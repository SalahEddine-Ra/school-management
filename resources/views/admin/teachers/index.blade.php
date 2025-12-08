<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="flex justify-between items-center mb-8">
                        <h1 class="text-4xl font-bold">All Teachers</h1>
                        <div class="flex gap-6">
                            <a href="{{ route('teachers.create') }}" 
                                class="bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-6 rounded-lg">
                                    + Add New Teacher
                            </a>
                            <a href="{{ route('dashboard') }}" class="text-blue-600 text-center pt-2 hover:underline ">Back to Dashboard</a>
                        </div>
                        
                    </div>

                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-6 py-4 rounded mb-6">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if($teachers->count() === 0)
                        <p class="text-xl text-gray-600">No Teacher yet. Add the first one!</p>
                    @else
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-300">
                                <thead class="bg-gray-50 dark:bg-gray-700">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Phone</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Subject</th>
                                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200">
                                    @foreach($teachers as $teacher)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $teacher->full_name }}</td>
                                            <td class="px-6 py-4">{{ $teacher->email ?? '-' }}</td>
                                            <td class="px-6 py-4">{{ $teacher->phone }}</td>
                                            <td class="px-6 py-4 capitalize">{{ $teacher->subject }}</td>
                                            <td class="px-6 py-4 text-right space-x-4">
                                                <div class="flex justify-end gap-4 ">  
                                                        <div class="bg-indigo-600 hover:bg-indigo-800 w-fit py-1 px-3 rounded" ><a href="{{ route('teachers.show', $teacher) }}" class="text-white">View</a></div>
                                                    <div class="bg-green-600 hover:bg-green-800 w-fit py-1 px-3 rounded" ><a href="{{ route('teachers.edit', $teacher) }}" class="text-white">Edit</a></div>
                                                    <form method="POST" action="{{ route('teachers.destroy', $teacher) }}" class="inline">
                                                        @csrf @method('DELETE')
                                                        <div class="bg-red-600 hover:bg-red-800 w-fit py-1 px-3 rounded" >
                                                            <button type="submit" onclick="return confirm('Delete this teacher?')" 
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
                            {{ $teachers->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>