<?php

namespace App\Http\Controllers\Admin\Projects;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProjectNoteStoreRequest;
use App\Models\Project;
use App\Models\ProjectNote;
use Illuminate\Http\Request;

class AdminProjectNoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $project = Project::findOrFail($id);
        $notes = ProjectNote::all();

        return view('admin.pages.projects.notes.index', compact('project', 'notes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $project = Project::findOrFail($id);

        return view('admin.pages.projects.notes.create', compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectNoteStoreRequest $request, $id)
    {
        $project = Project::findOrFail($id);

        $projectNote = ProjectNote::create([
            'title' => $request->title,
            'main_content' => $request->main_content,
            'show_to_client' => $request->show_to_client,
            'project_id' => $request->project_id
        ]);

        //Log activity
        activity()->log(auth()->user()->first_name . ' ' . auth()->user()->last_name . ' has added a note ' . $request->title . ' to project ' . $project->project_name);
        return redirect('admin/projects/'. $project->id . '/notes')->with('success', 'New Project Note added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, $noteId)
    {
        $project = Project::findOrFail($id);
        $note = ProjectNote::findOrFail($noteId);

        return view('admin.pages.projects.notes.show', compact('project', 'note'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, $noteId)
    {
        $project = Project::findOrFail($id);
        $note = ProjectNote::findOrFail($id);

        return view('admin.pages.projects.notes.edit', compact('project', 'note'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id, $noteId)
    {
        $project = Project::findOrFail($id);
        $note = ProjectNote::findOrFail($noteId);

        $note->update([
            'title' => $request->title,
            'main_content' => $request->main_content,
            'show_to_client' => $request->show_to_client,
            'project_id' => $request->project_id
        ]);

        activity()->log(auth()->user()->first_name . ' ' . auth()->user()->last_name . ' has updated project note ' . $request->title . ' on project ' . $project->project_name);
        return redirect('admin/projects/'. $project->id . '/notes')->with('success', 'Project Note updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, $noteId)
    {
        $project = Project::findOrFail($id);
        $note = ProjectNote::findOrFail($noteId);

        $note->delete();

        activity()->log(auth()->user()->first_name . ' ' . auth()->user()->last_name . ' has deleted a project note');
        return redirect('admin/projects/'.$project->id.'/notes')->with('success', 'Project Note deleted successfully');
    }
}
