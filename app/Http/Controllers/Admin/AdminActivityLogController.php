<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class AdminActivityLogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activities = Activity::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.pages.activity-log.index', compact('activities'));
    }

    public function clearLog(){
        Activity::truncate();
        return redirect()->back()->with('success', 'Activity Log cleared successfully');
    }
}
