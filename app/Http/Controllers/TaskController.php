<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();

        $totalTasks = $user->tasks()->count();
        $pendingTasks = $user->tasks()->where('status', 'pending')->count();
        $inProgressTasks = $user->tasks()->where('status', 'in_progress')->count();
        $completedTasks = $user->tasks()->where('status', 'completed')->count();

        return view('dashboard', compact(
            'totalTasks',
            'pendingTasks',
            'inProgressTasks',
            'completedTasks'
        ));
    }
   public function index(Request $request)
    {
        $query = Task::where('user_id', auth()->id());

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('sort')) {
            $query->orderBy('due_date', $request->sort);
        } else {
            $query->latest();
        }

        $tasks = $query->paginate(8)->withQueryString();

        return view('tasks.index', compact('tasks'));
    }
    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:pending,in_progress,completed',
            'due_date' => 'nullable|date',
        ]);

        Auth::user()->tasks()->create($request->only([
            'title',
            'description',
            'status',
            'due_date',
        ]));

        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    public function show(Task $task)
    {
        if ($task->user_id !== Auth::id()) {
            abort(403);
        }

        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task)
    {
        if ($task->user_id !== Auth::id()) {
            abort(403);
        }

        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        if ($task->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:pending,in_progress,completed',
            'due_date' => 'nullable|date',
        ]);

        $task->update($request->only([
            'title',
            'description',
            'status',
            'due_date',
        ]));

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    public function destroy(Task $task)
    {
        if ($task->user_id !== Auth::id()) {
            abort(403);
        }

        $task->delete();

        return redirect()->route('tasks.index')->with('delete', 'Task deleted successfully.');
    }

    public function deleted()
    {
        $tasks = Task::onlyTrashed()
            ->where('user_id', auth()->id())
            ->latest()
            ->paginate(8);

        return view('tasks.deleted', compact('tasks'));
    }

    public function restore($id)
    {
        $task = Task::onlyTrashed()
            ->where('user_id', auth()->id())
            ->findOrFail($id);

        $task->restore();

        return redirect()->route('tasks.deleted')->with('success', 'Task restored successfully!');
    }

    public function forceDelete($id)
    {
        $task = Task::onlyTrashed()
            ->where('user_id', auth()->id())
            ->findOrFail($id);

        $task->forceDelete();

        return redirect()->route('tasks.deleted')->with('delete', 'Task permanently deleted!');
    }
}