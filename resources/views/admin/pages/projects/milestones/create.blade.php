@extends('layouts.admin')
<x-admin.page-top
    pageTitle="Create Milestone"
    pageStyles=""
    pageScripts=""
/>
@section('content')

    <x-admin.page-hero
        title="Create Milestone"
        displayButton="yes"
        buttonContent="All Project Milestones"
        buttonLink="{{ route('admin.projects.milestones.index', ['id' => $project->id]) }}"
    />

    {{ Breadcrumbs::render('admin-projects-milestones-create', $project) }}

    <x-admin.errors/>

    <section class="adminActionBanner">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @include('admin.pages.projects.partials.singleProjectNav')
                </div>
            </div>
        </div>
    </section>

    <section class="pageMain">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('admin.projects.milestones.store', ['id' => $project->id]) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="row" style="display: none;">
                            <div class="col-12">
                                <input type="text" name="project_id" id="project_id" value="{{ $project->id }}">

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="">Name * </label>
                                <input type="text" name="name" id="name" value="{{ old('value') }}" required>
                                <x.form-errors fieldName="name" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Start Date *</label>
                                <input type="date" name="start_date" id="start_date" value="{{ old('start_date') }}" required>
                                <x.form-errors fieldName="start_date" />
                            </div>
                            <div class="col-md-6">
                                <label for="">Due Date *</label>
                                <input type="date" name="due_date" id="due_date" value="{{ old('due_date') }}" required>
                                <x.form-errors fieldName="due_date" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="">Description *</label>
                                <textarea name="description" id="description" cols="30" rows="10" class="tinyEditor" required>{{ old('description') }}</textarea>
                                <x.form-errors fieldName="description" />
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-md-4">
                                <div class="checkbox-group-single">
                                    <input type="checkbox" name="show_description_to_client" id="show_description_to_client">
                                    <label for="">Show description to Client</label>
                                </div>
                                <x.form-errors fieldName="show_description_to_client" />
                            </div>
                            <div class="col-md-4">
                                <div class="checkbox-group-single">
                                    <input type="checkbox" name="hide_milestones_from_client" id="hide_milestones_from_client">
                                    <label for="">Hide milestones from client</label>
                                </div>
                                <x.form-errors fieldName="hide_milestones_from_client" />
                            </div>
                            <div class="col-md-4">
                                <label for="">Order</label>
                                <input type="number" name="order" id="order">
                                <x.form-errors fieldName="order" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="">Assignee</label>
                                <select name="assignee_id" id="assignee_id">
                                    <option selected disabled>-- Select an Assignee --</option>
                                    @foreach($assignees as $assignee)
                                        <option value="{{ $assignee->id }}">{{ $assignee->first_name }} {{ $assignee->last_name }}</option>
                                    @endforeach
                                </select>
                                <x.form-errors fieldName="assignee_id" />
                            </div>
                            <div class="col-md-4">
                                <label for="">Status *</label>
                                <select name="status" id="status">
                                    <option value="not_started">Not Started</option>
                                    <option value="in_progress">In Progress</option>
                                    <option value="testing">Testing</option>
                                    <option value="awaiting_feedback">Awaiting Feedback</option>
                                    <option value="complete">Complete</option>
                                </select>
                                <x.form-errors fieldName="status" />
                            </div>
                            <div class="col-md-4">
                                <label for="">Priority *</label>
                                <select name="priority" id="priority">
                                    <option value="low">Low</option>
                                    <option value="medium">Medium</option>
                                    <option value="high">High</option>
                                    <option value="urgent">Urgent</option>
                                </select>
                                <x.form-errors fieldName="priority" />
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
