@extends('layouts.admin')

<x-admin.page-top
    pageTitle="Leads"
    pageStyles=""
    pageScripts=""
/>

@section('content')
    <x-admin.page-hero
        title="Create Lead"
        displayButton="yes"
        buttonContent="All Leads"
        buttonLink="{{ route('admin.leads.index') }}"
    />
    {{ Breadcrumbs::render('admin-leads-create') }}

    <x-admin.errors />

    <section class="pageMain">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('admin.leads.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <label for="">Lead Status *</label>
                                <select name="lead_status" id="lead_status">
                                    <option selected disabled>-- Select a status --</option>
                                    <option value="possible lead">Possible Lead</option>
                                    <option value="in talks">In Talks</option>
                                    <option value="awaiting confirmation">Awaiting Confirmation</option>
                                    <option value="lost">Lost</option>
                                </select>
                                <x.form-errors fieldName="lead_status"/>
                            </div>
                            <div class="col-md-4">
                                <label for="">Lead Source *</label>
                                <select name="lead_source" id="lead_source">
                                    <option selected disabled>-- Select a source --</option>
                                    <option value="social media">Social Media</option>
                                    <option value="search engine">Search Engine</option>
                                    <option value="website">Website</option>
                                    <option value="email">Email</option>
                                    <option value="phone call">Phone Call</option>
                                    <option value="word of mouth">Word of Mouth</option>
                                    <option value="marketing material">Marketing Material</option>
                                </select>
                                <x.form-errors fieldName="lead_source"/>
                            </div>
                            <div class="col-md-4">
                                <label for="">Assigned To *</label>
                                <select name="lead_assignee_id" id="lead_assignee_id" required>
                                    <option selected disabled>-- Choose an assignee --</option>
                                    @foreach($assignees as $assignee)
                                        <option value="{{ $assignee->id }}">{{ $assignee->first_name }} {{ $assignee->last_name }}</option>
                                    @endforeach
                                </select>
                                <x.form-errors fieldName="lead_assignee_id"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="">First Name *</label>
                                <input type="text" name="first_name" id="first_name" value="{{ old('first_name') }}" required>
                                <x.form-errors fieldName="first_name"/>
                            </div>
                            <div class="col-md-4">
                                <label for="">Last Name *</label>
                                <input type="text" name="last_name" id="last_name" value="{{ old('last_name') }}" required>
                                <x.form-errors fieldName="last_name" />
                            </div>
                            <div class="col-md-4">
                                <label for="">Company Name</label>
                                <input type="text" name="company_name" id="company_name" value="{{ old('company_name') }}">
                                <x.form-errors fieldName="company_name"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Email Address *</label>
                                <input type="email" name="email" id="email" value="{{ old('email') }}" required>
                                <x.form-errors fieldName="email"/>
                            </div>
                            <div class="col-md-3">
                                <label for="">Website</label>
                                <input type="url" name="website" id="website" value="{{ old('website') }}">
                                <x.form-errors fieldName="website"/>
                            </div>
                            <div class="col-md-3">
                                <label for="">Landline Number</label>
                                <input type="tel" name="landline_number" id="landline_number" value="{{ old('landline_number') }}">
                                <x.form-errors fieldName="landline_number"/>
                            </div>
                            <div class="col-md-3">
                                <label for="">Mobile Number</label>
                                <input type="tel" name="mobile_number" id="mobile_number" value="{{ old('mobile_number') }}">
                                <x.form-errors fieldName="mobile_number"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Address line One</label>
                                <input type="text" name="address_line_one" id="address_line_one" value="{{ old('address_line_one') }}">
                                <x.form-errors fieldName="address_line_one"/>
                            </div>
                            <div class="col-md-6">
                                <label for="">Address Line Two</label>
                                <input type="text" name="address_line_two" id="address_line_two" value="{{ old('address_line_two') }}">
                                <x.form-errors fieldName="address_line_two"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Town/City</label>
                                <input type="text" name="town_city" id="town_city" value="{{ old('town_city') }}">
                                <x.form-errors fieldName="town_city"/>
                            </div>
                            <div class="col-md-3">
                                <label for="">State/County</label>
                                <input type="text" name="state_county" id="state_county" value="{{ old('state_county') }}">
                                <x.form-errors fieldName="state_county"/>
                            </div>
                            <div class="col-md-3">
                                <label for="">Zip/Postcode</label>
                                <input type="text" name="zip_postcode" id="zip_postcode" value="{{ old('zip_postcode') }}">
                                <x.form-errors fieldName="zip_postcode"/>
                            </div>
                            <div class="col-md-3">
                                <label for="">Country</label>
                                <select name="country" id="country">
                                    <option selected disabled>-- Choose a country --</option>
                                    @foreach($countries as $country)
                                        <option value="{{ $country }}" @if($country == 'United Kingdom') selected @endif>{{ $country }}</option>
                                    @endforeach
                                    <x.form-errors fieldName="country"/>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="">Lead Value</label>
                                <input type="number" name="lead_value" id="lead_value" value="{{ old('lead_value') }}">
                                <x.form-errors fieldName="lead_value"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="">Description</label>
                                <textarea name="description" id="description" cols="30" rows="10" class="tinyEditor">{{ old('description') }}</textarea>
                                <x.form-errors fieldName="description"/>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-lg darkBlueBtn">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
