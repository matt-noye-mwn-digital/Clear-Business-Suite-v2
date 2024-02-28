@extends('layouts.admin')
@push('page-title')
    All Timesheets
@endpush
@section('content')
    <x-admin.page-hero
        title="All Timesheets"
        displayButton="yes"
        buttonContent="Create Timesheet"
        buttonLink="{{ route('admin.timesheets.create') }}"
    />
    <section class="pageMain div container">
        <div class="row">
            <div class="col-12">
                <table class="table w-100">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Start date & time</th>
                            <th>End date & time</th>
                            <th>Description</th>
                            <th class="actions">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($timesheets as $timesheet)
                            <tr>
                                <td>{{ $timesheet->id }}</td>
                                <td>{{ $timesheet->start_date_time }}</td>
                                <td>{{ $timesheet->end_date_time }}</td>
                                <td>{!! Str::limit($timesheet->description, 100) !!}</td>
                                <td class="actions">
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fas fa-ellipsis-vertical"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="">View</a>
                                            </li>
                                            <li>
                                                <a href="">Edit</a>
                                            </li>
                                            <li>
                                                <form action="" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit">Delete</button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
