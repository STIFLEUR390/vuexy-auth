@extends('layouts.guest')

@section('title')
    @lang("Reset Password")
@endsection

@section('script')
    <script src="{{ asset('admin/app-assets/js/scripts/pages/auth-reset-password.min.js') }}"></script>
@endsection

@section('content')
    <!-- Left Text-->
    <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
        <div class="w-100 d-lg-flex align-items-center justify-content-center px-5"><img class="img-fluid"
                src="{{ asset('admin/app-assets/images/illustration/two-steps-verification-illustration-dark.svg') }}"
                alt="two steps verification" /></div>
    </div>
    <!-- /Left Text-->
    <!-- two steps verification v2-->
    <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
        <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
            <h2 class="card-title fw-bolder mb-1">@lang('Two factor Challenge') &#x1F4AC;</h2>
            <p class="card-text mb-75">{{ __('Please enter your authentication code to login.') }}</p>

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

           <form class="mt-2" action="/two-factor-challenge" method="POST">
            @csrf

                <div class="mb-1">
                    <label class="form-label" for="code">@lang('Authentication code:')</label>
                    <input class="form-control" value="{{ old('code') }}" id="code" type="code" name="code" placeholder="@lang('Authentication code')" aria-describedby="name" autofocus="" tabindex="1" />
                </div>
                <button class="btn btn-primary w-100" type="submit" tabindex="2">@lang("Submit")</button>
            </form>
        </div>
    </div>
@endsection
