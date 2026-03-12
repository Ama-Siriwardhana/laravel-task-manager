<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-black">
            Tasks
        </h2>
    </x-slot>

    <div class="py-10 bg-blue-100 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="flex justify-center">
                <a href="{{ route('tasks.create') }}"
                class="inline-block bg-blue-600 text-white px-6 py-3 rounded-lg shadow
                        hover:bg-blue-800 hover:shadow-xl
                        transform hover:scale-110 transition duration-300 mb-6">
                    + Add a new task
                </a>
            </div>

            <form method="GET" action="{{ route('tasks.index') }}" class="mb-6 mt-6 flex flex-wrap gap-4 items-center">
                <input type="text"
                       name="search"
                       value="{{ request('search') }}"
                       placeholder="Search tasks"
                       class="border rounded-lg px-4 py-3 w-64 shadow-sm focus:ring-2 focus:ring-blue-400">

                <select name="status"
                        class="border rounded-lg px-4 py-3 w-52 shadow-sm focus:ring-2 focus:ring-blue-400">
                    <option value="">All Status</option>
                    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="in_progress" {{ request('status') == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                </select>
                <select name="sort" class="border rounded-lg px-4 py-3 w-52 shadow-sm">
                    <option value="">Sort by Due Date</option>
                    <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>
                        Nearest First
                    </option>
                    <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>
                        Latest First
                    </option>
                </select>
                <button type="submit"
                        class="bg-gray-600 text-white px-5 py-3 rounded-lg shadow hover:bg-gray-800 hover:shadow-xl transition duration-300">
                    Filter
                </button>
            </form>

            <div class="bg-white shadow-lg rounded-xl overflow-hidden">
                <table class="min-w-full border-collapse">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="px-6 py-4 text-left text-lg font-semibold">Title</th>
                            <th class="px-6 py-4 text-left text-lg font-semibold">Status</th>
                            <th class="px-6 py-4 text-left text-lg font-semibold">Due Date</th>
                            <th class="px-6 py-4 text-left text-lg font-semibold">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($tasks as $task)
                            <tr class="border-t hover:bg-gray-50 transition {{ $task->due_date && $task->due_date < now()->toDateString() && $task->status != 'completed' ? 'bg-red-50' : '' }}">
                                <td class="px-6 py-4">{{ $task->title }}</td>
                                <td class="px-6 py-4">
                                    @if($task->status == 'pending')
                                        <span class="px-3 py-1 text-sm bg-yellow-200 text-yellow-800 rounded-full">
                                            Pending
                                        </span>

                                    @elseif($task->status == 'in_progress')
                                        <span class="px-3 py-1 text-sm bg-blue-200 text-blue-800 rounded-full">
                                            In Progress
                                        </span>

                                    @elseif($task->status == 'completed')
                                        <span class="px-3 py-1 text-sm bg-green-200 text-green-800 rounded-full">
                                            Completed
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">{{ $task->due_date ?? 'N/A' }}</td>
                                <td class="px-6 py-4 space-x-2">
                                    <a href="{{ route('tasks.show', $task) }}"
                                       class="inline-block bg-blue-500 text-white px-3 py-2 rounded-md hover:bg-blue-700 transition">
                                        View
                                    </a>

                                    <a href="{{ route('tasks.edit', $task) }}"
                                       class="inline-block bg-green-500 text-white px-3 py-2 rounded-md hover:bg-green-700 transition">
                                        Edit
                                    </a>

                                    <div x-data="{ open: false }" class="inline">

                                    <button 
                                        @click="open = true"
                                        class="bg-red-500 text-white px-3 py-2 rounded-md hover:bg-red-700 transition">
                                        Delete
                                    </button>

                                    <div 
                                        x-show="open"
                                        x-transition
                                        class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">

                                        <div class="bg-white p-6 rounded-lg shadow-lg w-96">

                                            <h2 class="text-lg font-semibold mb-4">
                                                Confirm Delete
                                            </h2>

                                            <p class="mb-6">
                                                Are you sure you want to delete this task?
                                            </p>

                                            <div class="flex justify-end gap-3">

                                                <button 
                                                    @click="open = false"
                                                    class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">
                                                    Cancel
                                                </button>

                                                <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button 
                                                        class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-700">
                                                        Delete
                                                    </button>
                                                </form>

                                            </div>

                                        </div>

                                    </div>

                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-6 text-center text-gray-500">
                                    No tasks found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-6">
                {{ $tasks->links() }}
            </div>
            <a href="{{ route('tasks.deleted') }}"
            class="inline-block bg-red-600 text-white px-6 py-3 rounded-lg shadow hover:bg-red-800 hover:shadow-xl transition duration-300 ml-4 mt-6">
                Deleted Tasks
            </a>
        </div>
    </div>
</x-app-layout>