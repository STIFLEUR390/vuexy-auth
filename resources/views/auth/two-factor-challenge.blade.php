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
            <h2 class="card-title fw-bolder mb-1">@lang('Two Factor Authentication') &#x1F4AC;</h2>
            <p class="card-text mb-75">@lang('We have sent a verification code to your email address. Enter the code received by email in the field below.')</p>
            <p class="card-text fw-bolder mb-2">******@gmail.com</p>
            <form class="mt-2" action="index.html" method="POST">
                <h6>@lang("Type your 6 digit security code")</h6>
                <div class="auth-input-wrapper d-flex align-items-center justify-content-between">
                    <input class="form-control auth-input height-50 text-center numeral-mask mx-25 mb-1" type="text"
                        maxlength="1" autofocus="" />
                    <input class="form-control auth-input height-50 text-center numeral-mask mx-25 mb-1" type="text"
                        maxlength="1" />
                    <input class="form-control auth-input height-50 text-center numeral-mask mx-25 mb-1" type="text"
                        maxlength="1" />
                    <input class="form-control auth-input height-50 text-center numeral-mask mx-25 mb-1" type="text"
                        maxlength="1" />
                    <input class="form-control auth-input height-50 text-center numeral-mask mx-25 mb-1" type="text"
                        maxlength="1" />
                    <input class="form-control auth-input height-50 text-center numeral-mask mx-25 mb-1" type="text"
                        maxlength="1" />
                </div>
                <button class="btn btn-primary w-100" type="submit" tabindex="4">@lang("Verify my account")</button>
            </form>
            <p class="text-center mt-2">
                <span>@lang("Didn't get the code?")</span>
                <a href="Javascript:void(0)"><span>&nbsp;@lang('Resend')&nbsp;</span></a>
                <span>@lang('or')</span>
                <a href="Javascript:void(0)"><span>&nbsp;@lang('Call Us')</span></a>
            </p>
        </div>
    </div>
@endsection
