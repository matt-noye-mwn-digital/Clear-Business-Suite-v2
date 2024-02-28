@extends('layouts.admin')
@push('page-title')
    Create Timesheet
@endpush
@section('content')
    <x-admin.page-hero
        title="Create Timesheet"
        displayButton="yes"
        buttonContent="All Timesheets"
        buttonLink="{{ route('admin.timesheets.index') }}"
    />
    <section class="pageMain">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('admin.timesheets.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <label for=''>Start Date & Time *</label>
                                <input type="datetime-local" name="start_date_time"  value="{{ old('start_date_time') }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="">End Date & Time *</label>
                                <input type="datetime-local" name="end_date_time"  value="{{ old('end_date_time') }}" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="">Description *</label>
                                <textarea name="description"  cols="30" rows="10" class="tinyEditor" required>{{ old('description') }}</textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group-checkbox">
                                    <input type="checkbox" name="project_related" id="project_related">
                                    <label for="">Project related</label>
                                </div>
                                <small>Check if related to a project</small>
                            </div>
                            <div class="col-md-6">
                                <div class="projectWrap" style="display: none;">
                                    <label for="">Project</label>
                                    <select name="project_id" >
                                        @foreach($projects as $project)
                                            <option value="{{ $project->id }}">{{ $project->project_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 d-lg-flex justify-content-lg-end">
                                <button type="submit" class="btn btn-lg darkBlueBtn">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script>
        $(document).ready(function(){
            $('#project_related').change(function(){
               if($(this).is(':checked')){
                   $('.projectWrap').slideDown(1000);
               }
               else {
                   $('.projectWrap').slideUp(1000);
               }
            });

        });
    </script>
@endsection
