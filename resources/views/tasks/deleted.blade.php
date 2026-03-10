<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-black">
            Deleted Tasks
        </h2>
    </x-slot>

    <div class="py-10 bg-blue-100 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="mb-6">
                <a href="{{ route('tasks.index') }}"
                   class="inline-block bg-gray-600 text-white px-6 py-3 rounded-lg shadow hover:bg-gray-800 transition duration-300">
                    Back to Tasks
                </a>
            </div>

            <div class="bg-white shadow-lg rounded-xl overflow-hidden">
                <table class="min-w-full border-collapse">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="px-6 py-4 text-left text-lg font-semibold">Title</th>
                            <th class="px-6 py-4 text-left text-lg font-semibold">Status</th>
                            <th class="px-6 py-4 text-left text-lg font-semibold">Due Date</th>
                            <th class="px-6 py-4 text-left text-lg font-semibold">Deleted At</th>
                            <th class="px-6 py-4 text-left text-lg font-semibold">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($tasks as $task)
                            <tr class="border-t">
                                <td class="px-6 py-4">{{ $task->title }}</td>
                                <td class="px-6 py-4">{{ $task->status }}</td>
                                <td class="px-6 py-4">{{ $task->due_date ?? 'N/A' }}</td>
                                <td class="px-6 py-4">{{ $task->deleted_at }}</td>
                                <td class="px-6 py-4 space-x-2">
                                    <form action="{{ route('tasks.restore', $task->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit"
                                                class="bg-green-500 text-white px-3 py-2 rounded-md hover:bg-green-700 transition">
                                            Restore
                                        </button>
                                    </form>

                                    <form action="{{ route('tasks.forceDelete', $task->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="bg-red-500 text-white px-3 py-2 rounded-md hover:bg-red-700 transition">
                                            Delete Permanently
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-6 text-center text-gray-500">
                                    No deleted tasks found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-6">
                {{ $tasks->links() }}
            </div>

        </div>
    </div>
</x-app-layout>