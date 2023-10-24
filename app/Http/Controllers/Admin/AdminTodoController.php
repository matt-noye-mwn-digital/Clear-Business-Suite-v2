<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TodoStoreRequest;
use App\Models\Todo;
use App\Models\User;
use App\Notifications\AdminUserTodoNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminTodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todos = Todo::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(10);

        return view('admin.pages.todos.index', compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $staff = User::role(['super admin', 'admin'])->get();
        return view('admin.pages.todos.create', compact('staff'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $todo = Todo::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'due_date' => $request->due_date,
            'completed_at' => $request->completed_at,
            'user_id' => $request->user_id,
        ]);

        $userNotify = [User::find($request->user_id), Auth::user()];

        foreach ($userNotify as $user) {
            if ($user) {
                $user->notify(new AdminUserTodoNotification($todo));
            }
        }

        activity()->log(auth()->user()->first_name . ' ' . auth()->user()->last_name . ' has created a new todo item');
        return redirect('admin/todos')->with('success', 'Todo has been created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $todo = Todo::findOrFail($id);
        return view('admin.pages.todos.show', compact('todo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $todo = Todo::findOrFail($id);
        $staff = User::role(['super admin', 'admin'])->get();
        return view('admin.pages.todos.edit', compact('todo', 'staff'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TodoStoreRequest $request, string $id)
    {
        $todo = Todo::find($id);

        $todo->update([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'due_date' => $request->due_date,
            'completed_at' => $request->completed_at,
            'user_id' => $request->user_id,
        ]);

        activity()->log(auth()->user()->first_name . ' ' . auth()->user()->last_name . ' has updated a todo item');
        return redirect('admin/todos')->with('success', 'Todo has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $todo = Todo::findOrFail($id);
        $todo->delete();

        activity()->log(auth()->user()->first_name . ' ' . auth()->user()->last_name . ' has deleted a todo');
        return redirect('admin/todos')->with('success', 'Todo successfully deleted');
    }
}
