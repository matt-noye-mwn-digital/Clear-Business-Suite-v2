@extends('layouts.admin')
<x-admin.page-top
    pageTitle="View {{ $note->title }} Note"
    pageStyles=""
    pageScripts=""
/>
@section('content')
    <x-admin.page-hero
        title="View {{ $note->title }} Note"
        displayButton="yes"
        buttonContent="All Project Notes"
        buttonLink="{{ route('admin.projects.notes.index', $project->id) }}"
    />

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
                        <tbody>
                            <tr>
                                <td><strong>Title</strong></td>
                                <td>{{ $note->title }}</td>
                            </tr>
                            <tr>
                                <td><strong>Content</strong></td>
                                <td>{!! $note->main_content !!}</td>
                            </tr>
                            <tr>
                                <td><strong>Show to client</strong></td>
                                <td>{!! $note->getStatus() !!}</td>
                            </tr>
                            <tr>
                                <td><strong>Created At</strong></td>
                                <td>{{ date('d/m/Y H:i', strtotime($note->created_at)) }}</td>
                            </tr>
                            <tr>
                                <td><strong>Updated At</strong></td>
                                <td>{{ date('d/m/Y H:i', strtotime($note->updated_at)) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
