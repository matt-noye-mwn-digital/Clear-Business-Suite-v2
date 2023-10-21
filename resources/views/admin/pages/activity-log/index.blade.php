@extends('layouts.admin')

<x-admin.page-top
    pageTitle="Activity Log"
    pageStyles=""
    pageScripts=""
/>

@section('content')
    <x-admin.page-hero
        title="Activity Log"
        displayButton="no"
    />
    {{ Breadcrumbs::render('admin-activity-log') }}

    <section class="pageMain">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12 d-flex justify-content-end">
                    <form action="{{ route('admin.activity-log.clear') }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-warning confirm-log-clear-btn">Clear Log</button>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Description</th>
                            <th>Causer Type</th>
                            <th>Caused By</th>
                            <th>Date</th>
                            <th>Time</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($activities as $activity)
                            <tr>
                                <td>{{ $activity->description }}</td>
                                <td>{{ $activity->causer_type }}</td>
                                <td>User ID: {{ $activity->causer_id }}</td>
                                <td>{{ date('d/m/Y', strtotime($activity->created_at)) }}</td>
                                <td>{{ date('H:i', strtotime($activity->created_at)) }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

@endsection
