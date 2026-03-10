<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Task Details
        </h2>
    </x-slot>

    <div class="p-6 space-y-4">
        <div>
            <strong>Title:</strong> {{ $task->title }}
        </div>

        <div>
            <strong>Description:</strong> {{ $task->description ?? 'No description provided' }}
        </div>

        <div>
            <strong>Status:</strong> {{ $task->status }}
        </div>

        <div>
            <strong>Due Date:</strong> {{ $task->due_date }}
        </div>

        <div class="mt-20">
        <a href="{{ route('tasks.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-700 hover:shadow-lg transition duration-300">
            Back
        </a>
        </div>
    </div>
</x-app-layout>