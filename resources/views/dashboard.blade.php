<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black">
            Task Manager Dashboard
        </h2>
    </x-slot>

    <div class="py-12 bg-blue-100 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-gray-100 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-center text-blue-500 text-3xl">
                    Welcome to your Task Manager System!
                </div>
            </div>

            <div class="mt-12 text-center">
                <a href="{{ route('tasks.index') }}"
                   class="bg-gray-200 text-black px-6 py-3 rounded-lg shadow 
                          hover:shadow-2xl hover:bg-gray-800 hover:text-white
                          transform hover:scale-110 transition duration-300">
                    View your tasks list   >>>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-12">

                <div class="bg-white p-10 rounded-xl shadow-lg text-center hover:shadow-2xl transition">
                    <h3 class="text-gray-500 text-lg font-semibold">Total Tasks</h3>
                    <p class="text-5xl font-bold text-blue-700 mt-4">{{ $totalTasks }}</p>
                </div>

                <div class="bg-white p-10 rounded-xl shadow-lg text-center hover:shadow-2xl transition">
                    <h3 class="text-gray-500 text-lg font-semibold">Pending Tasks</h3>
                    <p class="text-5xl font-bold text-yellow-600 mt-4">{{ $pendingTasks }}</p>
                </div>

                <div class="bg-white p-10 rounded-xl shadow-lg text-center hover:shadow-2xl transition">
                    <h3 class="text-gray-500 text-lg font-semibold">In Progress</h3>
                    <p class="text-5xl font-bold text-blue-500 mt-4">{{ $inProgressTasks }}</p>
                </div>

                <div class="bg-white p-10 rounded-xl shadow-lg text-center hover:shadow-2xl transition">
                    <h3 class="text-gray-500 text-lg font-semibold">Completed Tasks</h3>
                    <p class="text-5xl font-bold text-green-600 mt-4">{{ $completedTasks }}</p>
                </div>

            </div>
            
                        <div class="bg-white shadow-lg rounded-xl p-6 mt-6">
                <h3 class="text-xl font-semibold mb-4">Tasks Due Soon</h3>

                <form method="GET" action="{{ route('dashboard') }}" class="flex flex-wrap gap-4 items-end">
                    <div>
                        <label class="block text-sm font-medium mb-1">Within Days</label>
                        <input type="number" name="days" value="{{ $days }}" min="1" 
                            class="border rounded-lg px-4 py-2 w-32">
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-1">Number of Tasks</label>
                        <input type="number" name="limit" value="{{ $limit }}" min="1"
                            class="border rounded-lg px-4 py-2 w-32">
                    </div>

                    <div>
                        <button type="submit"
                                class="bg-blue-600 text-white px-5 py-2 rounded-lg shadow hover:bg-blue-800 transition mt-6">
                            Apply
                        </button>
                    </div>
                </form>

                @forelse($dueSoon as $task)
                    <div class="flex justify-between border-b py-2 mt-6">
                        <span>{{ $task->title }}</span>
                        <span class="text-gray-500">{{ $task->due_date }}</span>
                    </div>
                @empty
                    <p class="text-gray-500">No upcoming tasks</p>
                @endforelse
            </div>

            <div class="bg-white shadow-lg rounded-xl p-6 mt-6 border-l-4 border-red-500">
                <h3 class="text-xl font-semibold mb-4 text-red-600">Overdue Tasks</h3>

                @forelse($overdueTasks as $task)
                    <div class="flex justify-between border-b py-2">
                        <span>{{ $task->title }}</span>
                        <span class="text-red-500">{{ $task->due_date }}</span>
                    </div>
                @empty
                    <p class="text-gray-500">No overdue tasks</p>
                @endforelse
            </div>

        </div>
    </div>
</x-app-layout>