@extends('layouts.guest')

@section('title')
    @lang("Verify Email Address")
@endsection

@section('script')
    <script src="{{ asset('admin/app-assets/js/scripts/pages/auth-reset-password.min.js') }}"></script>
@endsection

@section('content')
    <!-- Left Text-->
    <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
        <div class="w-100 d-lg-flex align-items-center justify-content-center px-5"><img class="img-fluid"
                src="{{ asset('admin/app-assets/images/illustration/verify-email-illustration-dark.svg') }}"
                alt="@lang('Verify Email Address')" /></div>
    </div>
    <!-- /Left Text-->
    <!-- verify email v2-->
    <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
        <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
            <h2 class="card-title fw-bolder mb-1">@lang('Verify your email ✉️')</h2>
            <p class="card-text mb-2">@lang('Account activation link sent to your email address:')
                <span class="fw-bolder"> hello@pixinvent.com</span>
                @lang("Please follow the link inside to continue.")
            </p>
            <a class="btn btn-primary w-100" href="index.html">@lang("Skip for now")</a>
            <p class="text-center mt-2">
                <span>@lang("Didn't receive an email?")</span>
                <a href="Javascript:void(0)"><span>&nbsp;@lang("Resend")</span></a>
            </p>
        </div>
    </div>
    <!-- verify email-->
@endsection
