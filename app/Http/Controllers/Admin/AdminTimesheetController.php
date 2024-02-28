<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Timesheet;
use App\Models\TimesheetLineItem;
use App\Models\User;
use Illuminate\Http\Request;

class AdminTimesheetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $timesheets = Timesheet::orderBy('start_date_time', 'asc')
            ->paginate(10);

        return view('admin.pages.timesheets.index', compact('timesheets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::role(['staff', 'admin', 'super admin'])->get();
        $projects = Project::where('project_status', '!=', 'complete')
            ->orderBy('project_name', 'asc')
            ->get();

        return view('admin.pages.timesheets.create', compact('users', 'projects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        TimeSheet::create([
            'start_date_time' => $request->input('start_date_time'),
            'end_date_time' => $request->input('end_date_time'),
            'description' => $request->input('description'),
            'project_id' => $request->input('project_id'),
            'user_id' => auth()->user()->id,
        ]);

        return redirect('admin/timesheets')->with('success', 'Timesheet created successfully');

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
