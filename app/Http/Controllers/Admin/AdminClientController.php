<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ClientStoreRequest;
use App\Models\Currency;
use App\Models\PaymentMethod;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Monarobase\CountryList\CountryListFacade;

class AdminClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = User::role('client')->paginate(20);
        return view('admin.pages.clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $paymentMethods = PaymentMethod::orderBy('name', 'asc')->get();
        $countries = CountryListFacade::getList('en');
        $currencies = Currency::orderBy('name', 'asc')->get();
        return view('admin.pages.clients.create', compact('paymentMethods', 'countries', 'currencies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClientStoreRequest $request)
    {
        $profilePicture = NULL;
        $profilePicturePath = NULL;

        $password = Str::random(20);

        if($request->hasFile('profile_picture')){
            $profilePicture = $request->profile_picture;
            $fileName = time().'_'.$profilePicture->getClientOriginalName();
            $folder = 'public/clients/'. $request->first_name . ' ' . $request->last_name . '';

            $profilePicturePath = $profilePicture->storeAs($folder, $fileName);
        }

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($password),
            'profile_picture' => $profilePicturePath,
            'status' => 'active',

        ]);

        $user->assignRole('client');

        $userDetails = userDetail::create([
            'user_id' => $user->id,
            'company_name' => $request->company_name,
            'address_line_one' => $request->address_line_one,
            'address_line_two' => $request->address_line_two,
            'town_city' => $request->town_city,
            'zip_postcode' => $request->zip_postcode,
            'state_county' => $request->state_county,
            'country' => $request->country,
            'landline_number' => $request->landline_number,
            'mobile_number' => $request->mobile_number,
            'website' => $request->website,
            'default_payment_method' => $request->default_payment_method,
            'description' => $request->description,
        ]);

        activity()->log(auth()->user()->first_name .' '. auth()->user()->last_name . ' has created a client account for ' . $request->first_name . ' ' . $request->last_name . ' ' . $request->company_name);
        return redirect('admin/clients')->with('success', 'New client created successfully');
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
