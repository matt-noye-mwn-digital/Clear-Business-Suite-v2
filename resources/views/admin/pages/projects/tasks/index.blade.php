@extends('layouts.admin')
<x-admin.page-top
    pageTitle="All {{ $project->project_name }} tasks"
    pageStyles=""
    pageScripts=""
/>
@section('content')

    <x-admin.page-hero
        title="All {{ $project->project_name }} Tasks"
        displayButton="yes"
        buttonContent="Add New Task"
        buttonLink="{{ route('admin.projects.tasks.create', ['id' => $project->id]) }}"
    />

    {{ Breadcrumbs::render('admin-projects-tasks-index', $project) }}

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
                    <table class="table w-full table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Status</th>
                                <th>Start Date</th>
                                <th>Due Date</th>
                                <th>Assigned to</th>
                                <th>Priority</th>
                                <th class="actions">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tasks as $task)
                                <tr>
                                    <td>{{ $task->id }}</td>
                                    <td>{{ $task->title }}</td>
                                    <td>{!! $task->getStatus() !!}</td>
                                    <td>{{ date('d/m/Y', strtotime($task->start_date)) }}</td>
                                    <td>@if($task->due_date){{ date('d/m/Y', strtotime($task->due_date)) }} @else -- @endif</td>
                                    <td>{{ $task->assignee->first_name }} {{ $task->assignee->last_name }}</td>
                                    <td>{!! $task->getPriority() !!}</td>
                                    <td class="actions">
                                        <div class="btn-group">
                                            <a href="{{ route('admin.projects.tasks.show', ['id' => $project->id, 'taskId' => $task->id]) }}" class="view-btn"><i class="fas fa-eye"></i></a>
                                            <a href="{{ route('admin.projects.tasks.edit', ['id' => $project->id, 'taskId' => $task->id]) }}" class="edit-btn"><i class="fas fa-edit"></i></a>
                                            <form action="{{ route('admin.projects.tasks.destroy', ['id' => $project->id, 'taskId' => $task->id]) }}" method="POST">
                                                @csrf
                                                @method('delete') <!-- Add this hidden field to override the method -->
                                                <button type="submit" class="confirm-delete-btn"><i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

@endsection
