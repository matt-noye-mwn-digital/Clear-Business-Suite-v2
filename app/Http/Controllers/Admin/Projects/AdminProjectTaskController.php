<?php

namespace App\Http\Controllers\Admin\Projects;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProjectTaskStoreRequest;
use App\Models\Project;
use App\Models\ProjectTask;
use App\Models\User;
use App\Notifications\AdminProjectTaskCreatedNotification;
use App\Notifications\AdminProjectTaskUpdatedNotification;
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
    public function show(string $id, $taskId)
    {
        $project = Project::findOrFail($id);
        $task = ProjectTask::findOrFail($taskId);

        return view('admin.pages.projects.tasks.show', compact('project', 'task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, $taskId)
    {
        $project = Project::findOrFail($id);
        $task = ProjectTask::findOrFail($taskId);
        $projects = Project::all();
        $assignees = User::role(['super admin', 'admin', 'staff'])->get();

        return view('admin.pages.projects.tasks.edit', compact('project', 'task', 'projects', 'assignees'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectTaskStoreRequest $request, string $id, $taskId)
    {
        $project = Project::findOrFail($id);
        $projectTask = ProjectTask::findOrFail($taskId);
        $projectTask->update([
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
                $user->notify(new AdminProjectTaskUpdatedNotification($project, $projectTask));
            }
        }

        //Log in activity log
        activity()->log(auth()->user()->first_name . ' ' . auth()->user()->last_name . ' has updated task ' . $request->title . ' to project ' . $project->project_name);
        return redirect('admin/projects/'.$project->id.'/tasks')->with('success', 'Project Task updated successfully');
    }

    public function setPriorityToLow(Request $request, $id, $taskId) {
        $project = Project::findOrFail($id);
        $task = ProjectTask::findOrFail($taskId);

        $task->update([
            'priority' => 'low',
        ]);

        return redirect()->back()->with('success', 'Priority set to low');

    }
    public function setPriorityToMedium(Request $request, $id, $taskId) {
        $project = Project::findOrFail($id);
        $task = ProjectTask::findOrFail($taskId);

        $task->update([
            'priority' => 'medium',
        ]);

        return redirect()->back()->with('success', 'Priority set to Medium');

    }
    public function setPriorityToHigh(Request $request, $id, $taskId) {
        $project = Project::findOrFail($id);
        $task = ProjectTask::findOrFail($taskId);

        $task->update([
            'priority' => 'high',
        ]);

        return redirect()->back()->with('success', 'Priority set to High');

    }
    public function setPriorityToUrgent(Request $request, $id, $taskId) {
        $project = Project::findOrFail($id);
        $task = ProjectTask::findOrFail($taskId);

        $task->update([
            'priority' => 'urgent',
        ]);

        return redirect()->back()->with('success', 'Priority set to Urgent');
    }

    public function setStatusToNotStarted(Request $request, $id, $taskId) {
        $project = Project::findOrFail($id);
        $task = ProjectTask::findOrFail($taskId);

        $task->update([
            'status' => 'not_started',
        ]);

        return redirect()->back()->with('success', 'Status set to Not Started');
    }
    public function setStatusToInProgress(Request $request, $id, $taskId) {
        $project = Project::findOrFail($id);
        $task = ProjectTask::findOrFail($taskId);

        $task->update([
            'status' => 'in_progress',
        ]);

        return redirect()->back()->with('success', 'Status set to In Progress');
    }
    public function setStatusToTesting(Request $request, $id, $taskId) {
        $project = Project::findOrFail($id);
        $task = ProjectTask::findOrFail($taskId);

        $task->update([
            'status' => 'testing',
        ]);

        return redirect()->back()->with('success', 'Status set to Testing');
    }
    public function setStatusToAwaitingFeedback(Request $request, $id, $taskId) {
        $project = Project::findOrFail($id);
        $task = ProjectTask::findOrFail($taskId);

        $task->update([
            'status' => 'awaiting_feedback',
        ]);

        return redirect()->back()->with('success', 'Status set to Awaiting Feedback');
    }
    public function setStatusToComplete(Request $request, $id, $taskId) {
        $project = Project::findOrFail($id);
        $task = ProjectTask::findOrFail($taskId);

        $task->update([
            'status' => 'complete',
        ]);

        return redirect()->back()->with('success', 'Status set to Complete');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id, $taskId)
    {
        $project = Project::findOrFail($id);
        $task = ProjectTask::findOrFail($taskId);

        $task->delete();

        activity()->log(auth()->user()->first_name . ' ' . auth()->user()->last_name . ' has deleted a task');
        return redirect('admin/projects/'.$project->id.'/tasks')->with('success', 'Project Task deleted successfully');
    }
}
