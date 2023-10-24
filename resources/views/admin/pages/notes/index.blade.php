@extends('layouts.admin')

<x-admin.page-top
    pageTitle="All My Notes"
    pageStyles=""
    pageScripts=""
/>

@section('content')
    <x-admin.page-hero
        title="All my notes"
        displayButton="yes"
        buttonContent="Create New Note"
        buttonLink="{{ route('admin.notes.create') }}"
    />

    {{ Breadcrumbs::render('admin-notes') }}

    <section class="pageMain">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <table class="table w-100">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th class="actions">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($notes as $note)
                                <tr>
                                    <td>{{ $note->title }}</td>
                                    <td>{!! Str::limit($note->description, 75) !!}</td>
                                    <td>{{ date('d/m/Y', strtotime($note->created_at)) }}</td>
                                    <td>{{ date('d/m/Y', strtotime($note->updated_at)) }}</td>
                                    <td class="actions">
                                        <div class="btn-group">
                                            <a href="{{ route('admin.notes.show', $note->id) }}" class="view-btn"><i class="fas fa-eye"></i></a>
                                            <a href="" class="edit-btn"><i class="fas fa-edit"></i></a>
                                            <form action="{{ route('admin.notes.destroy', $note->id) }}" method="POST">
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
