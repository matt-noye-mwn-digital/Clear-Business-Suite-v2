@extends('layouts.admin')
<x-admin.page-top
    pageTitle="Edit Project Note {{ $note->title }}"
    pageStyles=""
    pageScripts=""
/>
@section('content')
    <x-admin.page-hero
        title="Create Project Note"
        displayButton="yes"
        buttonContent="Back to all Project Notes"
        buttonLink="{{ route('admin.projects.notes.index', ['id' => $project->id]) }}"
    />
    {{ Breadcrumbs::render('admin-projects-notes-edit', $project, $note) }}
    <x-admin.errors/>
    <section class="pageMain">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('admin.projects.notes.update', ['id' => $project->id, 'noteId' => $note->id]) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-12">
                                <label for="">Title *</label>
                                <input type="text" name="title" id="title" value="{{ old('title', $note->title) }}" required>
                                <x.form-errors fieldName="title"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="">Content *</label>
                                <textarea name="main_content" id="main_content" cols="30" rows="10" class="tinyEditor" required>{{ old('main_content', $note->main_content) }}</textarea>
                                <x.form-errors fieldName="main_content"/>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <label for="">Show note to client *</label>
                                <select name="show_to_client" id="show_to_client" required>
                                    <option selected disabled>-- Select an option --</option>
                                    <option value="0" @if($note->show_to_client == 0) selected @endif>No</option>
                                    <option value="1" @if($note->show_to_client == 1) selected @endif>Yes</option>
                                </select>
                                <x.form-errors fieldName="show_to_client"/>
                            </div>
                        </div>

                        <div class="row" style="display: none;">
                            <div class="col-12">
                                <input type="number" name="project_id" id="project_id" value="{{ $project->id }}">
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
