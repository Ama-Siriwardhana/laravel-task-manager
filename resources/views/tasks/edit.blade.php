<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Edit Task
        </h2>
    </x-slot>

    <div class="p-6">
        <form action="{{ route('tasks.update', $task) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block">Title</label>
                <input type="text" name="title" class="border p-2 w-full" value="{{ old('title', $task->title) }}">
                @error('title')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block">Description</label>
                <textarea name="description" class="border p-2 w-full">{{ old('description', $task->description) }}</textarea>
                @error('description')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block">Status</label>
                <select name="status" class="border p-2 w-full">
                    <option value="pending" {{ old('status', $task->status) === 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="in_progress" {{ old('status', $task->status) === 'in_progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="completed" {{ old('status', $task->status) === 'completed' ? 'selected' : '' }}>Completed</option>
                </select>
                @error('status')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block">Due Date</label>
                <input type="date" name="due_date" class="border p-2 w-full" value="{{ old('due_date', $task->due_date) }}">
                @error('due_date')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">
                Update Task
            </button>
        </form>
    </div>
</x-app-layout>