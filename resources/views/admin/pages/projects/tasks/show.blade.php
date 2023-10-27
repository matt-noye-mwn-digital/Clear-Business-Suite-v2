@extends('layouts.admin')

<x-admin.page-top
    pageTitle="View {{ $task->title }} Task"
    pageStyles=""
    pageScripts=""
/>

@section('content')
    <x-admin.page-hero
        title="View {{ $task->title }} Task"
        displayButton="yes"
        buttonContent="All Project Tasks"
        buttonLink="{{ route('admin.projects.tasks.index', $project->id) }}"
    />

    {{ Breadcrumbs::render('admin-projects-tasks-show', $project, $task) }}

    <section class="pageMain">
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex justify-content-end">
                    <div class="dropdown dropstart singleProjectTaskMoreDropdown">
                        <a class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">More</a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ route('admin.projects.tasks.edit', $task->id) }}">
                                    Edit Task
                                </a>
                            </li>
                            <hr>
                            <li>
                                <form action="" method="post">
                                    <button type="submit">Mark as In Progress</button>
                                </form>
                            </li>
                            <li>
                                <form action="" method="post">
                                    <button type="submit">Mark As Testing</button>
                                </form>
                            </li>
                            <li>
                                <form action="" method="post">
                                    <button type="submit">Mark as Awaiting Feedback</button>
                                </form>
                            </li>
                            <li>
                                <form action="" method="post">
                                    <button type="submit">Mark as Complete</button>
                                </form>
                            </li>
                            <hr>
                            <li>
                                <form action="" method="post">
                                    <button type="submit">Mark as Low Priority</button>
                                </form>
                            </li>
                            <li>
                                <form action="" method="post">
                                    <button type="submit">Mark as Medium Priority</button>
                                </form>
                            </li>
                            <li>
                                <form action="" method="post">
                                    <button type="submit">Mark as High Priority</button>
                                </form>
                            </li>
                            <li>
                                <form action="" method="post">
                                    <button type="submit">Mark as Urgent</button>
                                </form>
                            </li>
                            <hr>
                            <li>
                                <form action="{{ route('admin.projects.tasks.destroy', ['id' => $project->id, 'taskId' => $task->id]) }}" method="POST">
                                    @csrf
                                    @method('delete') <!-- Add this hidden field to override the method -->
                                    <button type="submit" class="confirm-delete-btn text-danger">Delete</i>
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <table class="table w-100">
                        <tbody>
                            <tr>
                                <td><strong>Title</strong></td>
                                <td>{{ $task->title }}</td>
                            </tr>
                            <tr>
                                <td><strong>Start Date</strong></td>
                                <td>{{ date('d/m/Y', strtotime($task->start_date)) }}</td>
                            </tr>
                            <tr>
                                <td><strong>Due Date</strong></td>
                                <td>@if($task->due_date) {{ date('d/m/Y', strtotime($task->due_date)) }} @else -- @endif</td>
                            </tr>
                            <tr>
                                <td><strong>Priority</strong></td>
                                <td>{!! $task->getPriority() !!}</td>
                            </tr>
                            <tr>
                                <td><strong>Status</strong></td>
                                <td>{!! $task->getStatus() !!}</td>
                            </tr>
                            <tr>
                                <td><strong>Description</strong></td>
                                <td>{!! $task->description !!}</td>
                            </tr>
                            <tr>
                                <td><strong>Assigned To</strong></td>
                                <td>{{ $task->assignee->first_name }} {{ $task->assignee->last_name }}</td>
                            </tr>
                            <tr>
                                <td><strong>Created:</strong></td>
                                <td>{{ date('d/m/Y H:i', strtotime($task->created_at)) }}</td>
                            </tr>
                            <tr>
                                <td><strong>Updated:</strong></td>
                                <td>{{ date('d/m/Y H:i', strtotime($task->updated_at)) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
