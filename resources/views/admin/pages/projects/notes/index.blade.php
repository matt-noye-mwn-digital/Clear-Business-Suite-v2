@extends('layouts.admin')
<x-admin.page-top
    pageTitle="All {{ $project->project_name }} notes"
    pageStyles=""
    pageScripts=""
/>
@section('content')
    <x-admin.page-hero
        title="All {{$project->project_name}} Notes"
        displayButton="yes"
        buttonContent="Add New Note"
        buttonLink="{{ route('admin.projects.notes.create', ['id' => $project->id]) }}"
    />

    {{ Breadcrumbs::render('admin-projects-notes-index', $project) }}

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
                    <table class="table w-100 table-hover">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Show to client</th>
                                <th class="actions">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($notes as $note)
                                <tr>
                                    <td>{{ $note->title }}</td>
                                    <td>{!! Str::limit($note->main_content, 100) !!}</td>
                                    <td>{!! $note->getStatus() !!}</td>
                                    <td class="actions">
                                        <div class="btn-group">
                                            <a href="{{ route('admin.projects.notes.show', ['id' => $project->id, 'noteId' => $note->id]) }}" class="view-btn"><i class="fas fa-eye"></i></a>
                                            <a href="{{ route('admin.projects.notes.edit', ['id' => $project->id, 'noteId' => $note->id]) }}" class="edit-btn"><i class="fas fa-edit"></i></a>
                                            <form action="{{ route('admin.projects.notes.destroy', ['id' => $project->id, 'noteId' => $note->id]) }}" method="POST">
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
