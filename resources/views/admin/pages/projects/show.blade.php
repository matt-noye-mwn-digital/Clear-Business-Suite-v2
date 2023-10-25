@extends('layouts.admin')
<x-admin.page-top
    pageTitle="View {{ $project->project_name }}"
    pageStyles=""
    pageScripts=""
/>

@section('content')
    <x-admin.page-hero
        title="view {{ $project->project_name }}"
        displayButton="yes"
        buttonContent="All Projects"
        buttonLink="{{ route('admin.projects.index') }}"
    />

    {{ Breadcrumbs::render('admin-projects-show', $project) }}

    <section class="adminActionBanner">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @include('admin.pages.projects.partials.singleProjectNav')
                </div>
            </div>
        </div>
    </section>

    <section class="pageMain projectSinglePage">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <table class="projectOverviewMainTable w-100">
                        <tbody>
                            <tr>
                                <td><strong>Project ID</strong></td>
                                <td>{{ $project->id }}</td>
                            </tr>
                            <tr>
                                <td><strong>Client</strong></td>
                                <td>
                                    @if($project->client_id)
                                        {{ $project->client->first_name }} {{ $project->client->last_name }}
                                    @else
                                        --
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Billing Type</strong></td>
                                <td>{{ $project->billing_type }}</td>
                            </tr>
                            <tr>
                                <td><strong>Estimated Hours</strong></td>
                                <td>{{ $project->estimated_hours }}</td>
                            </tr>
                            <tr>
                                <td><strong>Rate Per Hour</strong></td>
                                <td>
                                    @if($project->rate_per_hour)
                                        {{ $project->rate_per_hour }}
                                    @else
                                        --
                                    @endif
                                </td>
                            </tr>
                            @if($project->billing_type == 'fixed_rate')
                                <tr>
                                    <td><strong>Fixed Rate Total Price</strong></td>
                                    <td>{{ $project->fixed_rate_price }}</td>
                                </tr>
                            @elseif($project->billing_type == 'hourly')
                                <tr>
                                    <td><strong>Hourly Total Price</strong></td>
                                    <td>{{ $project->hourly_rate_total }}</td>
                                </tr>
                            @endif
                            <tr>
                                <td><strong>Project Total Price</strong></td>
                                <td>{{ $project->project_total }}</td>
                            </tr>
                            <tr>
                                <td><strong>Start Date</strong></td>
                                <td>{{ date('d/m/Y', strtotime($project->start_date)) }}</td>
                            </tr>
                            <tr>
                                <td><strong>Due Date</strong></td>
                                <td>
                                    @if($project->due_date)
                                        {{ date('d/m/Y', strtotime($project->due_date)) }}
                                    @else
                                        No due date currently set
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Date Created</strong></td>
                                <td>{{ date('d/m/Y', strtotime($project->created_at)) }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <h3 class="sectionTitle">
                        Description
                    </h3>
                    {!! $project->description !!}
                </div>
                <div class="col-md-6"></div>
            </div>
        </div>
    </section>
@endsection
