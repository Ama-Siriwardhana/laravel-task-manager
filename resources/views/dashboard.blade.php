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
                    + Add a new Task
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
        </div>
    </div>
</x-app-layout>