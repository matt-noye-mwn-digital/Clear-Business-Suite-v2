<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LeadStoreRequest;
use App\Models\Lead;
use App\Models\User;
use Illuminate\Http\Request;
use Monarobase\CountryList\CountryListFacade;

class AdminLeadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $leads = Lead::orderBy('created_at', 'desc')->paginate('10');

        return view('admin.pages.leads.index', compact('leads'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $assignees = User::role(['super admin', 'admin', 'staff'])->get();
        $countries = CountryListFacade::getList('en');
        return view('admin.pages.leads.create', compact('assignees', 'countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LeadStoreRequest $request)
    {
        Lead::create([
            'lead_status' => $request->lead_status,
            'lead_source' => $request->lead_source,
            'lead_assignee_id' => $request->lead_assignee_id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'company_name' => $request->company_name,
            'email' => $request->email,
            'landline_number' => $request->landline_number,
            'mobile_number' => $request->mobile_number,
            'website' => $request->website,
            'address_line_one' => $request->address_line_one,
            'address_line_two' => $request->address_line_two,
            'town_city' => $request->town_city,
            'state_county' => $request->state_county,
            'zip_postcode' => $request->zip_postcode,
            'country' => $request->country,
            'lead_value' => $request->lead_value,
            'description' => $request->description
        ]);

        activity()->log(auth()->user()->first_name . ' ' . auth()->user()->last_name . ' has created lead ' . $request->first_name . ' ' . $request->last_name);
        return redirect('admin/leads')->with('success', 'New lead created successfully');
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
