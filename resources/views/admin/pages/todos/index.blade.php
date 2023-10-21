@extends('layouts.admin')
<x-admin.page-top
    pageTitle="My Todos"
    pageStyles=""
    pageScripts=""
/>
@section('content')
    <x-admin.page-hero
        title="All My Todos"
        displayButton="yes"
        buttonContent="Create Todo"
        buttonLink="{{ route('admin.todos.create') }}"
    />

    {{ Breadcrumbs::render('admin-todos') }}

    <section class="pageMain">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <table class="table table-hover clickableTable">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th class="actions">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($todos as $todo)
                                <tr>
                                    <td>{{ $todo->title }}</td>
                                    <td>{!! Str::limit($todo->description, 75) !!}</td>
                                    <td>{!! $todo->getStatus() !!}</td>
                                    <td>{{ date('d/m/Y', strtotime($todo->created_at)) }}</td>
                                    <td class="actions">
                                        <div class="btn-group">
                                            <a href="{{ route('admin.todos.show', $todo->id) }}" class="view-btn"><i class="fas fa-eye"></i></a>
                                            <a href="" class="edit-btn"><i class="fas fa-edit"></i></a>
                                            <form action="{{ route('admin.todos.destroy', $todo->id) }}" method="POST">
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
