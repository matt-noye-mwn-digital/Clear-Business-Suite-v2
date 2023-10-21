@extends('layouts.admin')

<x-admin.page-top
    pageTitle="{{ $client->first_name }} {{ $client->last_name }}"
    pageStyles=""
    pageScripts=""
/>

@section('content')
    <x-admin.page-hero
        title="{{ $client->first_name }} {{ $client->last_name }}"
        displayButton="yes"
        buttonContent="All Clients"
        buttonLink="{{ route('admin.clients.index') }}"
    />
    {{ Breadcrumbs::render('admin-clients-show', $client) }}

    <x-admin.errors />
    @if($errors->any())
        <section class="errorsBanner">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="alert-danger" role="alert">
                            <ul>
                                @foreach($errors->all as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif


    <section class="pageMain clientProfileMain">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    @include('admin.pages.clients.clientNav')
                </div>
                <div class="col-lg-9">
                    <div class="infoWrap">
                        <form action="{{ route('admin.clients.update', $client->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">First Name *</label>
                                    <input type="text" name="first_name" id="first_name" value="{{ old('first_name', $client->first_name) }}" required>
                                    <x.form-errors fieldName="first_name"/>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Last Name *</label>
                                    <input type="text" name="last_name" id="last_name" value="{{ old('last_name', $client->last_name) }}" required>
                                    <x.form-errors fieldName="last_name"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <label for="">Company Name</label>
                                    <input type="text" name="company_name" id="company_name" value="{{ old('company_name', $client->userDetails->company_name) }}">
                                    <x.form-errors fieldName="company_name"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Email Address *</label>
                                    <input type="email" name="email" id="email" value="{{ old('email', $client->email) }}" required>
                                    <x.form-errors fieldName="email"/>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Website</label>
                                    <input type="text" name="website" id="website" value="{{ old('website', $client->userDetails->website) }}">
                                    <x.form-errors fieldName="website"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Mobile Number</label>
                                    <input type="tel" name="mobile_number" id="mobile_number" value="{{ old('mobile_number', $client->userDetails->mobile_number) }}">
                                    <x.form-errors fieldName="mobile_number"/>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Landline Number</label>
                                    <input type="tel" name="landline_number" id="landline_number" value="{{ old('landline_number', $client->userDetails->landline_number) }}">
                                    <x.form-errors fieldName="landline_number"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Address Line One *</label>
                                    <input type="text" name="address_line_one" id="address_line_one" value="{{ old('address_line_one', $client->userDetails->address_line_one) }}" required>
                                    <x.form-errors fieldName="address_line_one"/>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Address Line Two</label>
                                    <input type="text" name="address_line_two" id="address_line_two" value="{{ old('address_line_two', $client->userDetails->address_line_two) }}">
                                    <x.form-errors fieldName="address_line_two"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="">Town/City *</label>
                                    <input type="text" name="town_city" id="town_city" value="{{ old('town_city', $client->userDetails->town_city) }}">
                                    <x.form-errors fieldName="town_city"/>
                                </div>
                                <div class="col-md-3">
                                    <label for="">State/County</label>
                                    <input type="text" name="state_county" id="state_county" value="{{ old('state_county', $client->userDetails->state_county) }}">
                                    <x.form-errors fieldName="state_county"/>
                                </div>
                                <div class="col-md-3">
                                    <label for="">Zip/Postcode *</label>
                                    <input type="text" name="zip_postcode" id="zip_postcode" value="{{ old('zip_postcode', $client->userDetails->zip_postcode) }}" required>
                                    <x.form-errors fieldName="zip_postcode"/>
                                </div>
                                <div class="col-md-3">
                                    <label for="">Country *</label>
                                    <select name="country" id="country" required>
                                        @foreach($countries as $country)
                                            <option value="{{ $country }}" @if($country == $client->userDetails->country) selected @endif>{{ $country }}</option>
                                        @endforeach
                                    </select>
                                    <x.form-errors fieldName="country"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Default Payment Method</label>
                                    <select name="default_payment_method" id="default_payment_method">
                                        <option selected disabled>-- Select a payment method --</option>
                                        @foreach($paymentMethods as $paymentMethod)
                                            <option value="{{ $paymentMethod->name }}" @if($paymentMethod->name == $client->userDetails->default_payment_method) selected @endif>{{ $paymentMethod->name }}</option>
                                        @endforeach
                                    </select>
                                    <x.form-errors fieldName="default_payment_method"/>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Default Currency</label>
                                    <select name="default_currency" id="default_currency">
                                        <option selected disabled>-- Select a currency --</option>
                                        @foreach($currencies as $currency)
                                            <option value="{{ $currency->name }}" @if($currency->name == $client->userDetails->default_currency)selected @endif>{{ $currency->name }} - {{ $currency->code }} - {{ $currency->symbol }}</option>
                                        @endforeach
                                    </select>
                                    <x.form-errors fieldName="default_currency"/>
                                </div>
                            </div>

                            {{--<div class="row">
                                <div class="col-md-6">
                                    <label for="">Profile Picture</label>
                                    <input type="file" name="profile_picture" id="profile_picture">
                                    <x.form-errors fieldName="profile_picture"/>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Current profile Picture</label>
                                    @if($client->profile_picture)
                                        <img class="img-fluid" src="{{ Storage::url($user->profile_picture) }}" style="display: block; height: 50px; width: 50px;">
                                    @else
                                        No profile picture currently set
                                    @endif
                                </div>
                            </div>--}}

                            <div class="row">
                                <div class="col-12">
                                    <label for="">Description</label>
                                    <textarea name="description" id="description" cols="30" rows="10" class="tinyEditor">{{ $client->userDetails->description }}</textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-lg darkBlueBtn">
                                        Save <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
