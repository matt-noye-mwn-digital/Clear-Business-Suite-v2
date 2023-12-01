@extends('layouts.admin')
<x-admin.page-top
    pageTitle="View {{ $milestone->name }} Milestone"
    pageStyles=""
    pageScripts=""
/>

@section('content')
    <x-admin.page-hero
        title="View {{ $milestone->name }} Milestone"
        displayButton="yes"
        buttonContent="All Milestones"
        buttonLink="{{ route('admin.projects.milestones.index', $project->id) }}"
    />

    {{ Breadcrumbs::render('admin-projects-milestones-show', $project, $milestone) }}

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
                <div class="col-12 d-flex justify-content-end">
                    <div class="dropdown dropstart singleProjectTaskMoreDropdown">
                        <a type="button" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            More
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ route('admin.projects.milestones.edit', ['id' => $project->id, 'milestoneId' => $milestone->id]) }}">
                                    Edit Task
                                </a>
                            </li>
                            <hr>
                            <li>
                                <form action="{{ route('admin.projects.milestones.set-to-not-started-status', ['id' => $project->id, 'milestoneId' => $milestone->id]) }}" method="post">
                                    @csrf
                                    @method('put')
                                    <button type="submit">Not Started</button>
                                </form>
                            </li>
                            <li>
                                <form action="{{ route('admin.projects.milestones.set-to-in-progress-status', ['id' => $project->id, 'milestoneId' => $milestone->id]) }}" method="post">
                                    @csrf
                                    @method('put')
                                    <button type="submit">Mark as In Progress</button>
                                </form>
                            </li>
                            <li>
                                <form action="{{ route('admin.projects.milestones.set-to-testing-status', ['id' => $project->id, 'milestoneId' => $milestone->id]) }}" method="post">
                                    @csrf
                                    @method('put')
                                    <button type="submit">Mark as Testing</button>
                                </form>
                            </li>
                            <li>
                                <form action="{{ route('admin.projects.milestones.set-to-awaiting-feedback-status', ['id' => $project->id, 'milestoneId' => $milestone->id]) }}" method="post">
                                    @csrf
                                    @method('put')
                                    <button type="submit">Mark as Awaiting Feedback</button>
                                </form>
                            </li>
                            <li>
                                <form action="{{ route('admin.projects.milestones.set-to-complete-status', ['id' => $project->id, 'milestoneId' => $milestone->id]) }}" method="post">
                                    @csrf
                                    @method('put')
                                    <button type="submit">
                                        Mark as Complete
                                    </button>
                                </form>
                            </li>
                            <hr>
                            <li>
                                <form action="{{ route('admin.projects.milestones.set-low-priority', ['id' => $project->id, 'milestoneId' => $milestone->id]) }}" method="post">
                                    @csrf
                                    @method('put')
                                    <button type="submit">Mark as Low Priority</button>
                                </form>
                            </li>
                            <li>
                                <form action="{{ route('admin.projects.milestones.set-medium-priority', ['id' => $project->id, 'milestoneId' => $milestone->id]) }}" method="post">
                                    @csrf
                                    @method('put')
                                    <button type="submit">Mark as Medium Priority</button>
                                </form>
                            </li>
                            <li>
                                <form action="{{ route('admin.projects.milestones.set-high-priority', ['id' => $project->id, 'milestoneId' => $milestone->id]) }}" method="post">
                                    @csrf
                                    @method('put')
                                    <button type="submit">Mark as High Priority</button>
                                </form>
                            </li>
                            <li>
                                <form action="{{ route('admin.projects.milestones.set-urgent-priority', ['id' => $project->id, 'milestoneId' => $milestone->id]) }}" method="post">
                                    @csrf
                                    @method('put')
                                    <button type="submit">Mark as Urgent</button>
                                </form>
                            </li>
                            <hr>
                            <li>
                                <form action="{{ route('admin.projects.milestones.destroy', ['id' => $project->id, 'milestoneId' => $milestone->id]) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="confirm-delete-btn text-danger">Delete</button>
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
                                <td><strong>Name:</strong></td>
                                <td>{{ $milestone->name }}</td>
                            </tr>
                            <tr>
                                <td><strong>Start Date:</strong></td>
                                <td>{{ date('d/m/Y', strtotime($milestone->start_date)) }}</td>
                            </tr>
                            <tr>
                                <td><strong>Due Date:</strong></td>
                                <td>{{ date('d/m/Y', strtotime($milestone->due_date)) }}</td>
                            </tr>
                            <tr>
                                <td><strong>Description:</strong></td>
                                <td>{!! $milestone->description !!}</td>
                            </tr>
                            <tr>
                                <td><strong>Project:</strong></td>
                                <td>{{ $milestone->project->project_name }}</td>
                            </tr>
                            <tr>
                                <td><strong>Status:</strong></td>
                                <td>{!! $milestone->getStatus() !!}</td>
                            </tr>
                            <tr>
                                <td><strong>Priority:</strong></td>
                                <td>{!! $milestone->getPriority() !!}</td>
                            </tr>
                            <tr>
                                <td><strong>Created:</strong></td>
                                <td>{{ date('d/m/Y', strtotime($milestone->created_at)) }}</td>
                            </tr>
                            <tr>
                                <td><strong>Updated:</strong></td>
                                <td>{{ date('d/m/Y', strtotime($milestone->updated_at)) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
