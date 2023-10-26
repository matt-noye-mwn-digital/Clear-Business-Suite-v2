@extends('layouts.admin')

<x-admin.page-top
    pageTitle="Create Project Tasks"
    pageStyles=""
    pageScripts=""
/>

@section('content')
    <x-admin.page-hero
        title="Create Project Task"
        displayButton="yes"
        buttonContent="Back to All Project Tasks"
        buttonLink="{{ route('admin.projects.tasks.index', ['id' => $project->id]) }}"
    />
    {{ Breadcrumbs::render('admin-projects-tasks-create', $project) }}
    <x-admin.errors/>
    <section class="pageMain">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('admin.projects.tasks.store', ['id' => $project->id]) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-12">
                                <label for="">Title *</label>
                                <input type="text" name="title" id="title" value="{{ old('title') }}" required>
                                <x.form-errors fieldName="title" />
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
                            <div class="col-md-6">
                                <label for="">Priority</label>
                                <select name="priority" id="priority">
                                    <option value="low">Low</option>
                                    <option value="medium">Medium</option>
                                    <option value="high">High</option>
                                    <option value="urgent">Urgent</option>
                                </select>
                                <x.form-errors fieldName="priority"/>
                            </div>
                            <div class="col-md-6">
                                <label for="">Status</label>
                                <select name="status" id="status">
                                    <option value="not_started">Not Started</option>
                                    <option value="in_progress">In Progress</option>
                                    <option value="testing">Testing</option>
                                    <option value="awaiting_feedback">Awaiting Feedback</option>
                                    <option value="complete">Complete</option>
                                </select>
                                <x.form-errors fieldName="status"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Related To</label>
                                <select name="project_id" id="project_id" required>
                                    <option selected disabled>-- Choose a project --</option>
                                    @foreach($projects as $project)
                                        <option value="{{ $project->id }}">{{ $project->project_name }}</option>
                                    @endforeach
                                </select>
                                <x.form-errors fieldName="project_id"/>
                            </div>
                            <div class="col-md-6">
                                <label for="">Assignee *</label>
                                <select name="assignee_id" id="assignee_id" required>
                                    <option selected disabled>-- Choose an assignee --</option>
                                    @foreach($assignees as $assignee)
                                        <option value="{{ $assignee->id }}">{{ $assignee->first_name }} {{ $assignee->last_name }}</option>
                                    @endforeach
                                </select>
                                <x.form-errors fieldName="assignee_id"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="">Task Description *</label>
                                <textarea name="description" id="description" cols="30" rows="10" class="tinyEditor" required>{{ old('description') }}</textarea>
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
