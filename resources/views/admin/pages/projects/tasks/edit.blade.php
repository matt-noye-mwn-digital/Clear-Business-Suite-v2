@extends('layouts.admin')

<x-admin.page-top
    pageTitle="Edit Project Tasks"
    pageStyles=""
    pageScripts=""
/>

@section('content')
    <x-admin.page-hero
        title="Edit Project Task {{ $task->title }}"
        displayButton="yes"
        buttonContent="Back to All Project Tasks"
        buttonLink="{{ route('admin.projects.tasks.index', ['id' => $project->id]) }}"
    />
    {{ Breadcrumbs::render('admin-projects-tasks-edit', $project, $task) }}
    <x-admin.errors/>
    <section class="pageMain">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('admin.projects.tasks.update', ['id' => $project->id, 'taskId' => $task->id]) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-12">
                                <label for="">Title *</label>
                                <input type="text" name="title" id="title" value="{{ old('title', $task->title) }}" required>
                                <x.form-errors fieldName="title" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Start Date *</label>
                                <input type="date" name="start_date" id="start_date" value="{{ old('start_date', $task->start_date) }}" required>
                                <x.form-errors fieldName="start_date"/>
                            </div>
                            <div class="col-md-6">
                                <label for="">Due Date</label>
                                <input type="date" name="due_date" id="due_date" value="{{ old('due_date', $task->due_date) }}">
                                <x.form-errors fieldName="due_date"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Priority</label>
                                <select name="priority" id="priority">
                                    <option value="low" @if($task->priority == 'low') selected @endif>Low</option>
                                    <option value="medium" @if($task->priority == 'medium') selected @endif>Medium</option>
                                    <option value="high" @if($task->priority == 'high') selected @endif>High</option>
                                    <option value="urgent" @if($task->priority == 'urgent') selected @endif>Urgent</option>
                                </select>
                                <x.form-errors fieldName="priority"/>
                            </div>
                            <div class="col-md-6">
                                <label for="">Status</label>
                                <select name="status" id="status">
                                    <option value="not_started" @if($task->status == 'not_started') selected @endif>Not Started</option>
                                    <option value="in_progress" @if($task->status == 'in_progress') selected @endif>In Progress</option>
                                    <option value="testing" @if($task->status == 'testing') selected @endif>Testing</option>
                                    <option value="awaiting_feedback" @if($task->status == 'awaiting_feedback') selected @endif>Awaiting Feedback</option>
                                    <option value="complete" @if($task->status == 'complete') selected @endif>Complete</option>
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
                                        <option value="{{ $project->id }}" @if($project->id == $task->project_id) selected @endif>{{ $project->project_name }}</option>
                                    @endforeach
                                </select>
                                <x.form-errors fieldName="project_id"/>
                            </div>
                            <div class="col-md-6">
                                <label for="">Assignee *</label>
                                <select name="assignee_id" id="assignee_id" required>
                                    <option selected disabled>-- Choose an assignee --</option>
                                    @foreach($assignees as $assignee)
                                        <option value="{{ $assignee->id }}" @if($assignee->id == $task->assignee_id) selected @endif>{{ $assignee->first_name }} {{ $assignee->last_name }}</option>
                                    @endforeach
                                </select>
                                <x.form-errors fieldName="assignee_id"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="">Task Description *</label>
                                <textarea name="description" id="description" cols="30" rows="10" class="tinyEditor" required>{{ old('description', $task->description) }}</textarea>
                                <x.form-errors fieldName="description"/>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-lg darkBlueBtn">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
