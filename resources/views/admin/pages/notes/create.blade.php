@extends('layouts.admin')
<x-admin.page-top
    pageTitle="Create Note"
    pageStyles=""
    pageScripts=""
/>
@section('content')
    <x-admin.page-hero
        title="Create Note"
        displayButton="yes"
        buttonContent="All My Notes"
        buttonLink="{{ route('admin.notes.create') }}"
    />

    {{ Breadcrumbs::render('admin-notes-create') }}

    <x-admin.errors/>

    <section class="pageMain">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('admin.notes.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <label for="">Title *</label>
                                <input type="text" name="title" id="title" value="{{ old('title') }}" required>
                                <x.form-errors fieldName="title"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="">Content *</label>
                                <textarea name="description" id="description" cols="30" rows="10" class="tinyEditor" required>{{ old('description') }}</textarea>
                                <x.form-errors fieldName="description"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="">Make this note sticky?</label>
                                <select name="make_sticky" id="make_sticky">
                                    <option value="0" selected>No</option>
                                    <option value="1">yes</option>
                                </select>
                                <x.form-errors/>
                            </div>
                        </div>
                        <div class="row" style="display: none;">
                            <div class="col-12">
                                <input type="number" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
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
