<?php

namespace App\Http\Controllers\Admin\Projects;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProjectTaskStoreRequest;
use App\Models\Project;
use App\Models\ProjectTask;
use App\Models\User;
use App\Notifications\AdminProjectTaskCreatedNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminProjectTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $project = Project::findOrFail($id);
        $tasks = ProjectTask::all();

        return view('admin.pages.projects.tasks.index', compact('project', 'tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $project = Project::findOrFail($id);
        $projects = Project::all();
        $assignees = User::role(['super admin', 'admin', 'staff'])->get();

        return view('admin.pages.projects.tasks.create', compact('project', 'projects','assignees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectTaskStoreRequest $request, $id)
    {
        $project = Project::findOrFail($id);
        $projectTask = ProjectTask::create([
            'title' => $request->title,
            'start_date' => $request->start_date,
            'due_date' => $request->start_date,
            'priority' => $request->priority,
            'description' => $request->description,
            'project_id' => $request->project_id,
            'status' => $request->status,
            'assignee_id' => $request->assignee_id,
        ]);

        //Setup notification
        $userNotify = [User::find($projectTask->assignee_id), Auth::user()];
        foreach ($userNotify as $user) {
            if ($user) {
                $user->notify(new AdminProjectTaskCreatedNotification($project, $projectTask));
            }
        }

        //Log in activity log
        activity()->log(auth()->user()->first_name . ' ' . auth()->user()->last_name . ' has added task ' . $request->title . ' to project ' . $project->project_name);
        return redirect('admin/projects/'.$project->id.'/tasks')->with('success', 'New Project Task added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
