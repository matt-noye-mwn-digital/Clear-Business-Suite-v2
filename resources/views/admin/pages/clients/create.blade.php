@extends('layouts.admin')

<x-admin.page-top
    pageTitle="Create Client"
    pageStyles=""
    pageScripts=""
/>

@section('content')
    <x-admin.page-hero
        title="All Clients"
        displayButton="yes"
        buttonContent="All Clients"
        buttonLink="{{ route('admin.clients.index') }}"
        buttonLink="{{ route('admin.clients.index') }}"
    />
    {{ Breadcrumbs::render('admin-clients-create') }}

    <x-admin.errors />

    <section class="pageMain">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">First Name *</label>
                                <input type="text" name="first_name" id="first_name" value="{{ old('first_name') }}" required>
                                @error('first_name')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="">Last Name *</label>
                                <input type="text" name="last_name" id="last_name" value="{{ old('last_name') }}" required>
                                @error('last_name')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
