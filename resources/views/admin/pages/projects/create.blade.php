@extends('layouts.admin')

<x-admin.page-top
    pageTitle="Create Project"
    pageStyles=""
    pageScripts=""
/>

@section('content')
    <x-admin.page-hero
        title="Create Project"
        displayButton="yes"
        buttonContent="All Projects"
        buttonLink="{{ route('admin.projects.index') }}"
    />

    {{ Breadcrumbs::render('admin-projects-create') }}
    <x-admin.errors/>
    <section class="pageMain">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('admin.projects.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Project Name *</label>
                                <input type="text" name="project_name" id="project_name" value="{{ old('project_name') }}" required>
                                <x.form-errors fieldName="project_name"/>
                            </div>
                            <div class="col-md-6">
                                <label for="">Project Type *</label>
                                <select name="project_type_id" id="project_type_id" required>
                                    <option selected disabled>-- Choose a project type --</option>
                                    @foreach($projectTypes as $projectType)
                                        <option value="{{ $projectType->id }}">{{ $projectType->name }}</option>
                                    @endforeach
                                </select>
                                <x.form-errors fieldName="project_type_id"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Client</label>
                                <select name="client_id" id="client_id">
                                    <option selected disabled>-- Choose a client --</option>
                                    @foreach($clients as $client)
                                        <option value="{{ $client->id }}">{{ $client->first_name }} {{ $client->last_name }} @if($client->userDetails->company_name)- {{ $client->userDetails->company_name }}@endif</option>
                                    @endforeach
                                </select>
                                <x.form-errors fieldName="client_id"/>
                            </div>
                            <div class="col-md-6">
                                <label for="">Staff Member *</label>
                                <select name="staff_id" id="staff_id" required>
                                    <option>-- Choose a staff member --</option>
                                    @foreach($staff as $staff)
                                        <option value="{{ $staff->id }}">{{ $staff->first_name }} {{ $staff->last_name }}</option>
                                    @endforeach
                                </select>
                                <x.form-errors fieldName="staff_id"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Project Status *</label>
                                <select name="project_status" id="project_status" required>
                                    @foreach($projectStatuses as $status)
                                        <option value="{{ $status->name }}">{{ $status->name }}</option>
                                    @endforeach
                                </select>
                                <x.form-errors fieldName="project_status"/>
                            </div>
                            <div class="col-md-6">
                                <label for="">Progress</label>
                                <input type="number" name="progress" id="progress">
                                <x.form-errors fieldName="progress"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="">Billing Type *</label>
                                <select name="billing_type" id="billing_type" required>
                                    <option selected disabled>-- Choose a billing Type --</option>
                                    <option value="hourly">Hourly</option>
                                    <option value="fixed_rate">Fixed Rate</option>
                                </select>
                                <x.form-errors fieldName="billing_type"/>
                            </div>
                        </div>
                        <div class="row rate_per_hour" style="display:none;">
                            <div class="col-12">
                                <label for="">Rate Per Hour</label>
                                <input type="number" name="rate_per_hour" id="rate_per_hour" step="any">
                                <x.form-errors fieldName="rate_per_hour"/>
                            </div>
                        </div>
                        <div class="row fixed_rate" style="display: none;">
                            <div class="col-12">
                                <label for="">Fixed Rate Price</label>
                                <input type="number" name="fixed_rate_price" id="fixed_rate_price" step="any">
                                <x.form-errors fieldName="fixed_rate_price"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="">Estimated Hours</label>
                                <input type="number" name="estimated_hours" id="estimated_hours">
                                <x.form-errors fieldName="estimated_hours"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Start Date *</label>
                                <input type="date" name="start_date" id="start_date" value="{{ old('start_date') }}" required>
                                <x.form-errors fieldName="start_date"/>
                            </div>
                            <div class="col-md-6">
                                <label for="">Due Date</label>
                                <input type="date" name="due_date" id="due_date" value="{{ old('due_date') }}">
                                <x.form-errors fieldName="due_date"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="">Description *</label>
                                <textarea name="description" id="description" cols="30" rows="10" class="tinyEditor" required>{{ old('description') }}</textarea>
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

    <script>
        $(document).ready(function(){
            $('#billing_type').change(function(){
                var selected = $(this).val();
                console.log('changed');
                if(selected === 'hourly'){
                    $('.rate_per_hour').show();
                    $('.fixed_rate').hide();
                }
                else if(selected === 'fixed_rate'){
                    $('.fixed_rate').show();
                    $('.rate_per_hour').hide();
                }
            })
        })
    </script>
@endsection
