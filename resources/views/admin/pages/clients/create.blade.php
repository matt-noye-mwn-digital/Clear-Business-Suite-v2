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
                    <form action="{{ route('admin.clients.store') }}" method="post" enctype="multipart/form-data">
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
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Email Address *</label>
                                <input type="email" name="email" id="email" value="{{ old('email') }}" required>
                                @error('email')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="">Website</label>
                                <input type="text" name="website" id="website" value="{{ old('website') }}">
                                @error('website')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="">Mobile Number</label>
                                <input type="tel" name="mobile_number" id="mobile_number" value="{{ old('mobile_number') }}">
                                @error('mobile_number')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="">Landline Number</label>
                                <input type="tel" name="landline_number" id="landline_number" value="{{ old('landline_number') }}">
                                @error('landline_number')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Address Line One *</label>
                                <input type="text" name="address_line_one" id="address_line_one" value="{{ old('address_line_one') }}" required>
                                @error('address_line_one')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="">Address Line Two</label>
                                <input type="text" name="address_line_two" id="address_line_two" value="{{ old('address_line_two') }}">
                                @error('address_line_two')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Town/City *</label>
                                <input type="text" name="town_city" id="town_city" value="{{ old('town_city') }}">
                                @error('town_city')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="">State/County</label>
                                <input type="text" name="state_county" id="state_county" value="{{ old('state_county') }}">
                                @error('state_county')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="">Zip/Postcode *</label>
                                <input type="text" name="zip_postcode" id="zip_postcode" value="{{ old('zip_postcode') }}" required>
                                @error('zip_postcode')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="">Country *</label>
                                <select name="country" id="country" required>
                                    @foreach($countries as $country)
                                        <option value="{{ $country }}" @if($country == 'United Kingdom') selected @endif>{{ $country }}</option>
                                    @endforeach
                                </select>
                                @error('country')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Default Payment Method</label>
                                <select name="default_payment_method" id="default_payment_method">
                                    <option selected disabled>-- Select a payment method --</option>
                                    @foreach($paymentMethods as $paymentMethod)
                                        <option value="{{ $paymentMethod->name }}">{{ $paymentMethod->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="">Default Currency</label>
                                <select name="default_currency" id="default_currency">
                                    <option selected disabled>-- Select a currency --</option>
                                    @foreach($currencies as $currency)
                                        <option value="{{ $currency->name }}">{{ $currency->name }} - {{ $currency->code }} - {{ $currency->symbol }}</option>
                                    @endforeach
                                </select>
                                @error('default_currency')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
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
    </section>
@endsection
