@extends('layouts.admin')
<x-admin.page-top
    pageTitle="All {{ $project->project_name }} Milestones"
    pageStyles=""
    pageScripts=""
/>
@section('content')

    <x-admin.page-hero
        title="All {{ $project->project_name }} Milestones"
        displayButton="yes"
        buttonContent="Add New Milestone"
        buttonLink="{{ route('admin.projects.milestones.create', ['id' => $project->id]) }}"
    />

    {{ Breadcrumbs::render('admin-projects-milestones-index', $project) }}

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
                    <table class="table w-100">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Start Date</th>
                                <th>Due Date</th>
                                <th>Assignee</th>
                                <th class="actions">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($milestones as $milestone)
                                <tr>
                                    <td>{{ $milestone->name }}</td>
                                    <td>{{ date('d/m/Y', strtotime($milestone->start_date)) }}</td>
                                    <td>{{ date('d/m/Y', strtotime($milestone->due_date)) }}</td>
                                    <td>{{ $milestone->assignee->first_name }} {{ $milestone->assignee->last_name }}</td>
                                    <td class="actions">
                                        <div class="btn-group">
                                            <a href="{{ route('admin.projects.milestones.show', ['id' => $project->id, 'milestoneId' => $milestone->id]) }}" class="view-btn"><i class="fas fa-eye"></i></a>
                                            <a href="{{ route('admin.projects.milestones.edit', ['id' => $project->id, 'milestoneId' => $milestone->id]) }}" class="edit-btn"><i class="fas fa-edit"></i></a>
                                            <form action="{{ route('admin.projects.milestones.destroy', ['id' => $project->id, 'milestoneId' => $milestone->id]) }}" method="POST">
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
