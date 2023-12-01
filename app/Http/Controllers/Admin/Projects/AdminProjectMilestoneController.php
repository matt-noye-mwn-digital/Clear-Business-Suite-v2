<?php

namespace App\Http\Controllers\Admin\Projects;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProjectMilestoneStoreRequest;
use App\Models\Project;
use App\Models\ProjectMilestone;
use App\Models\User;
use App\Notifications\AdminProjectMilestoneNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminProjectMilestoneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $project = Project::findOrFail($id);
        $milestones = ProjectMilestone::where('project_id', $project->id)
            ->orderBy('due_date', 'desc')
            ->paginate(10);

        return view('admin.pages.projects.milestones.index', compact('project', 'milestones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $project = Project::findOrFail($id);
        $assignees = User::role(['super admin', 'admin', 'staff'])->get();

        return view('admin.pages.projects.milestones.create', compact('project', 'assignees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectMilestoneStoreRequest $request, $id)
    {
        $project = Project::findOrFail($id);

        if($request->has('show_description_to_client')){
            $showChecked = true;
        }
        else {
            $showChecked = false;
        }

        if($request->has('hide_milestone_from_client')){
            $hideFromClient = true;
        }
        else {
            $hideFromClient = false;
        }

        $projectMilestone = ProjectMilestone::create([
            'name' => $request->name,
            'start_date' => $request->start_date,
            'due_date' => $request->due_date,
            'description' => $request->description,
            'show_description_to_client' => $showChecked,
            'hide_milestone_from_client' => $hideFromClient,
            'project_id' => $request->project_id,
            'assignee_id' => $request->assignee_id,
            'order' => $request->order,
            'status' => $request->status,
            'priority' => $request->priority
        ]);

        //Setup the notif
        $userNotify = [User::find($projectMilestone->assignee_id), Auth::user()];
        foreach($userNotify as $user) {
            if($user) {
                $user->notify(new AdminProjectMilestoneNotification($project, $projectMilestone));
            }
        }

        //Log activity
        activity()->log(auth()->user()->first_name . ' ' . auth()->user()->last_name . ' has added a milestone ' . $request->name . ' to project ' . $project->project_name);

        return redirect('admin/projects/'. $project->id . '/milestones')->with('success', 'New Project Milestone added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, $milestoneId)
    {
        $project = Project::findOrFail($id);
        $milestone = ProjectMilestone::findOrFail($milestoneId);

        return view('admin.pages.projects.milestones.show', compact('project', 'milestone'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, $milestoneId)
    {
        $project = Project::findOrFail($id);
        $milestone = ProjectMilestone::findOrFail($milestoneId);
        $assignees = User::role(['super admin', 'admin', 'staff'])->get();

        return view('admin.pages.projects.milestones.edit', compact('project', 'milestone', 'assignees'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectMilestoneStoreRequest $request, string $id, $milestoneId)
    {
        $project = Project::findOrFail($id);
        $milestone = ProjectMilestone::findOrFail($milestoneId);

        $milestone->update([
            'name' => $request->name,
            'start_date' => $request->start_date,
            'due_date' => $request->due_date,
            'description' => $request->description,
            'show_description_to_client' => $request->show_description_to_client,
            'hide_milestone_from_client' => $request->hide_milestone_from_client,
            'project_id' => $request->project_id,
            'assignee_id' => $request->assignee_id,
            'order' => $request->order,
            'status' => $request->status,
            'priority' => $request->priority
        ]);


        //Log activity
        activity()->log(auth()->user()->first_name . ' ' . auth()->user()->last_name . ' has updated ' . $milestone->name . ' on ' . $project->project_name);
        return redirect('admin/projects/' . $project->id . '/milestones')->with('success', 'Project Milestone has been updated successfully');
    }

    public function setPriorityToLow(Request $request, $id, $milestoneId) {
        $project = Project::findOrFail($id);
        $milestone = ProjectMilestone::findOrFail($milestoneId);

        $milestone->update([
            'priority' => 'low',
        ]);

        return redirect()->back()->with('success', 'Priority set to low');

    }
    public function setPriorityToMedium(Request $request, $id, $milestoneId) {
        $project = Project::findOrFail($id);
        $milestone = ProjectMilestone::findOrFail($milestoneId);

        $milestone->update([
            'priority' => 'medium',
        ]);

        return redirect()->back()->with('success', 'Priority set to Medium');

    }
    public function setPriorityToHigh(Request $request, $id, $milestoneId) {
        $project = Project::findOrFail($id);
        $milestone = ProjectMilestone::findOrFail($milestoneId);

        $milestone->update([
            'priority' => 'high',
        ]);

        return redirect()->back()->with('success', 'Priority set to High');

    }
    public function setPriorityToUrgent(Request $request, $id, $milestoneId) {
        $project = Project::findOrFail($id);
        $milestone = ProjectMilestone::findOrFail($milestoneId);

        $milestone->update([
            'priority' => 'urgent',
        ]);

        return redirect()->back()->with('success', 'Priority set to Urgent');
    }

    public function setStatusToNotStarted(Request $request, $id, $milestoneId) {
        $project = Project::findOrFail($id);
        $milestone = ProjectMilestone::findOrFail($milestoneId);

        $milestone->update([
            'status' => 'not_started',
        ]);

        return redirect()->back()->with('success', 'Status set to Not Started');
    }
    public function setStatusToInProgress(Request $request, $id, $milestoneId) {
        $project = Project::findOrFail($id);
        $milestone = ProjectMilestone::findOrFail($milestoneId);

        $milestone->update([
            'status' => 'in_progress',
        ]);

        return redirect()->back()->with('success', 'Status set to In Progress');
    }
    public function setStatusToTesting(Request $request, $id, $milestoneId) {
        $project = Project::findOrFail($id);
        $milestone = ProjectMilestone::findOrFail($milestoneId);

        $milestone->update([
            'status' => 'testing',
        ]);

        return redirect()->back()->with('success', 'Status set to Testing');
    }
    public function setStatusToAwaitingFeedback(Request $request, $id, $milestoneId) {
        $project = Project::findOrFail($id);
        $milestone = ProjectMilestone::findOrFail($milestoneId);

        $milestone->update([
            'status' => 'awaiting_feedback',
        ]);

        return redirect()->back()->with('success', 'Status set to Awaiting Feedback');
    }
    public function setStatusToComplete(Request $request, $id, $milestoneId) {
        $project = Project::findOrFail($id);
        $milestone = ProjectMilestone::findOrFail($milestoneId);

        $milestone->update([
            'status' => 'complete',
        ]);

        return redirect()->back()->with('success', 'Status set to Complete');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, $milestoneId)
    {
        $project = Project::findOrFail($id);
        $milestone = ProjectMilestone::findOrFail($milestoneId);

        $milestone->delete();

        activity()->log(auth()->user()->first_nane . ' ' . auth()->user()->last_name . ' has deleted a project milestone');
        return redirect('admin/projects/'. $project->id . '/milestones')->with('success', 'Project milestone deleted successfully');
    }
}
