<?php

namespace App\Http\Controllers\Admin\Projects;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProjectStoreRequest;
use App\Models\Project;
use App\Models\ProjectStatus;
use App\Models\ProjectType;
use App\Models\User;
use Illuminate\Http\Request;

class AdminProjectIndexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.pages.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $projectTypes = ProjectType::all();
        $projectStatuses = ProjectStatus::all();
        $clients = User::role('client')->get();
        $staff = User::role(['super admin', 'admin', 'staff'])->get();

        return view('admin.pages.projects.create', compact('projectTypes', 'projectStatuses', 'clients', 'staff'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectStoreRequest $request)
    {
        Project::create([
            'project_name' => $request->project_name,
            'project_type_id' => $request->project_type_id,
            'project_status' => $request->project_status,
            'progress' => $request->progress,
            'billing_type' => $request->billing_type,
            'fixed_rate_price' => $request->fixed_rate_price,
            'rate_per_hour' => $request->rate_per_hour,
            'project_total' => $request->project_total,
            'estimated_hours' => $request->estimated_hours,
            'start_date' => $request->start_date,
            'due_date' => $request->due_date,
            'description' => $request->description,
            'staff_id' => $request->staff_id,
            'client_id' => $request->client_id,
        ]);

        activity()->log(auth()->user()->first_name . ' '. auth()->user()->last_name . ' has created a new project titled ' . $request->project_name);
        return redirect('admin/projects')->with('success', 'New project created successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $project = Project::findOrFail($id);

        return view('admin.pages.projects.show', compact('project'));
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
