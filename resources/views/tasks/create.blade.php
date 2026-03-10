<x-app-layout> 
    <x-slot name="header"> 
        <h2 class="font-semibold text-xl text-gray-800"> 
            Create Task 
        </h2> 
    </x-slot> 
    <div class="p-6"> 
        <form action="{{ route('tasks.store') }}" 
        method="POST" class="space-y-4"> 
        @csrf 
        <div> 
            <label class="block">Title</label> 
            <input type="text" name="title" 
            class="border p-2 w-full" value="{{ old('title') }}"> 
            @error('title') 
            <p class="text-red-500">{{ $message }}

            </p> @enderror 
        </div> 
        <div> 
            <label class="block">Description</label> 
            <textarea name="description" class="border p-2 w-full">{{ old('description') }}</textarea> 
            @error('description') 
            <p class="text-red-500">{{ $message }}

            </p> 
            @enderror 
        </div> 
        <div> 
            <label class="block">Status</label> 
            <select name="status" class="border p-2 w-full"> 
                <option value="pending">Pending</option> 
                <option value="in_progress">In Progress</option> 
                <option value="completed">Completed</option> 
            </select> @error('status') 
            <p class="text-red-500">{{ $message }}</p> 
            @enderror 
        </div> 
        <div> 
            <label class="block">Due Date</label> 
            <input type="date" name="due_date" 
            class="border p-2 w-full" value="{{ old('due_date') }}"> 
            @error('due_date') <p class="text-red-500">{{ $message }}</p> 
            @enderror 
        </div> 
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded"> 
            Save Task 
        </button> 
    </form> 
</div> 
</x-app-layout>