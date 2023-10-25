@extends('layouts.admin')

<x-admin.page-top
    pageTitle="All Projects"
    pageStyles=""
    pageScripts=""
/>

@section('content')
    <x-admin.page-hero
        title="All Projects"
        displayButton="yes"
        buttonContent="Add New Project"
        buttonLink="{{ route('admin.projects.create') }}"
    />

    {{ Breadcrumbs::render('admin-projects') }}

    <section class="pageMain">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <table class="table w-full table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Project Name</th>
                                <th>Start Date</th>
                                <th>Due Date</th>
                                <th>Status</th>
                                <th>Client</th>
                                <th class="actions">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($projects as $project)
                                <tr>
                                    <td>{{ $project->id }}</td>
                                    <td>{{ $project->project_name }}</td>
                                    <td>{{ date('d/m/Y', strtotime($project->start_date)) }}</td>
                                    <td>@if($project->due_date) {{ date('d/m/Y', strtotime($project->due_date)) }} @else -- @endif</td>
                                    <td>{{ $project->project_status }}</td>
                                    <td>
                                        @if($project->client_id)
                                            {{ $project->client->first_name }} {{ $project->client->last_name }}
                                        @else
                                            --
                                        @endif
                                    </td>
                                    <td class="actions">
                                        <div class="btn-group">
                                            <a href="" class="view-btn"><i class="fas fa-eye"></i></a>
                                            <a href="" class="edit-btn"><i class="fas fa-edit"></i></a>
                                            <form action="" method="POST">
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
                    {{ $projects->links() }}
                </div>
            </div>
        </div>
    </section>

@endsection
