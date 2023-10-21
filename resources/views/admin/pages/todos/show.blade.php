@extends('layouts.admin')
<x-admin.page-top
    pageTitle="My Todo - {{ $todo->title }}"
    pageStyles=""
    pageScripts=""
/>
@section('content')
    <x-admin.page-hero
        title="My Todo - {{ $todo->title }}"
        displayButton="yes"
        buttonContent="All My Todo"
        buttonLink="{{ route('admin.todos.index') }}"
    />
    {{ Breadcrumbs::render('admin-todos-show', $todo) }}

    <section class="adminActionBanner">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="btn-group">
                        <a href="{{ route('admin.todos.edit', $todo->id) }}" class="edit-btn"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('admin.todos.destroy', $todo->id) }}" method="POST">
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

    <section class="pageMain" style="position: relative;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="todoStatusNotif" style="position: absolute; top: 1.5rem; right: 1.5rem;">
                        {!! $todo->getStatus() !!}
                    </div>
                    <table class="table w-100">
                        <tbody>
                            <tr>
                                <td><strong>Title</strong></td>
                                <td>{{ $todo->title }}</td>
                            </tr>
                            <tr>
                                <td><strong>Description</strong></td>
                                <td>{!! $todo->description !!}</td>
                            </tr>
                            <tr>
                                <td><strong>Due Date</strong></td>
                                <td>@if($todo->due_date) {{ date('d/m/Y', strtotime($todo->due_date)) }} @else -- @endif</td>
                            </tr>
                            <tr>
                                <td><strong>Completed At</strong></td>
                                <td>@if($todo->completed_at) {{ date('d/m/Y', strtotime($todo->completed_at)) }} @else -- @endif</td>
                            </tr>
                            <tr>
                                <td><strong>Assigned To</strong></td>
                                <td>{{ $todo->user->first_name }} {{ $todo->user->last_name }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

@endsection
