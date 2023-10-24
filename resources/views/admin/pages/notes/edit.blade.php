@extends('layouts.admin')
<x-admin.page-top
    pageTitle="Edit Note"
    pageStyles=""
    pageScripts=""
/>
@section('content')
    <x-admin.page-hero
        title="Edit {{ $note->title }} Note"
        displayButton="yes"
        buttonContent="All My Notes"
        buttonLink="{{ route('admin.notes.create') }}"
    />

    {{ Breadcrumbs::render('admin-notes-edit', $note) }}

    <x-admin.errors/>

    <section class="pageMain">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('admin.notes.update', $note->id) }}" method="post">
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
                                <textarea name="description" id="description" cols="30" rows="10" class="tinyEditor" required>{{ old('description', $note->description) }}</textarea>
                                <x.form-errors fieldName="description"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="">Make this note sticky?</label>
                                <select name="make_sticky" id="make_sticky">
                                    <option value="0" @if($note->make_sticky == 0) selected @endif>No</option>
                                    <option value="1" @if($note->make_sticky == 1) selected @endif>yes</option>
                                </select>
                                <x.form-errors/>
                            </div>
                        </div>
                        <div class="row" style="display: none;">
                            <div class="col-12">
                                <input type="number" name="user_id" id="user_id" value="{{ $note->user_id }}">
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
