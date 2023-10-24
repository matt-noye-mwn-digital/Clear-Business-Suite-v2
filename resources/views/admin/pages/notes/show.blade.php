@extends('layouts.admin')
<x-admin.page-top
    pageTitle="View {{ $note->title }}"
    pageStyles=""
    pageScripts=""
/>

@section('content')
    <x-admin.page-hero
        title="View {{ $note->title }}"
        displayButton="yes"
        buttonContent="All My Notes"
        buttonLink="{{ route('admin.notes.index') }}"
    />

    {{ Breadcrumbs::render('admin-notes-show', $note) }}

    <section class="adminActionBanner">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="btn-group">
                        <a href="{{ route('admin.notes.edit', $note->id) }}" class="edit-btn"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('admin.notes.destroy', $note->id) }}" method="POST">
                            @csrf
                            @method('delete') <!-- Add this hidden field to override the method -->
                            <button type="submit" class="confirm-delete-btn"><i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="pageMain">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <table class="table w-100">
                        <tbody>
                            <tr>
                                <td><strong>Title</strong></td>
                                <td>{{ $note->title }}</td>
                            </tr>
                            <tr>
                                <td><strong>Content</strong></td>
                                <td>{!! $note->description !!}</td>
                            </tr>
                            <tr>
                                <td><strong>Is this sticky?</strong></td>
                                <td>
                                    @if($note->make_sticky == 0)
                                        No
                                    @else
                                        Yes
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Assigned to</strong></td>
                                <td>{{ $note->user->first_name }} {{ $note->user->last_name }}</td>
                            </tr>
                            <tr>
                                <td><strong>Created</strong></td>
                                <td>{{ date('d/m/Y', strtotime($note->created_at)) }}</td>
                            </tr>
                            <tr>
                                <td><strong>Updated</strong></td>
                                <td>{{ date('d/m/Y', strtotime($note->updated_at)) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
