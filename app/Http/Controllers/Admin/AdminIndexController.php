<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class AdminIndexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $unpaidInvoicesCount = Invoice::where('status', 'unpaid')->count();
        $clientsCount = User::role('client')->count();
        $leadCount = User::role('lead')->count();
        $projectCount = Project::where('project_status', '<>', 'completed')
            ->where('project_status', '<>', 'cancelled')
            ->count();

        return view('admin.pages.dashboard', compact('unpaidInvoicesCount', 'clientsCount', 'leadCount', 'projectCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
