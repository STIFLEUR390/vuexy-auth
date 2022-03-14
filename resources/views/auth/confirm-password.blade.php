@extends('layouts.guest')

@section('title')
    @lang("Confirm Password")
@endsection

@section('script')
    <script src="{{ asset('admin/app-assets/js/scripts/pages/auth-forgot-password.min.js') }}"></script>
@endsection

@section('content')
    <!-- Left Text-->
    <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
        <div class="w-100 d-lg-flex align-items-center justify-content-center px-5"><img class="img-fluid" src="@lang("
                admin/app-assets/images/pages/forgot-password-v2-dark.svg")" alt="@lang(" Forgot Your Password?")" /></div>
    </div>
    <!-- /Left Text-->
    <!-- Forgot password-->
    <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
        <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
            <h2 class="card-title fw-bold mb-1">@lang("Confirm Password")</h2>
            <p class="card-text mb-2">
                {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}</p>
            <form class="auth-forgot-password-form mt-2" action="auth-reset-password-cover.html" method="POST">
                <div class="mb-1">
                    <div class="d-flex justify-content-between">
                        <label class="form-label" for="login-password">@lang('Password')</label><a
                            href="auth-forgot-password-cover.html"><small>@lang('Forgot Your Password?')</small></a>
                    </div>
                    <div class="input-group input-group-merge form-password-toggle">
                        <input class="form-control form-control-merge" id="login-password" type="password"
                            name="login-password" placeholder="············" aria-describedby="login-password"
                            tabindex="2" /><span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                    </div>
                </div>
                <button class="btn btn-primary w-100" tabindex="2">@lang('Confirm')</button>
            </form>
            {{-- <p class="text-center mt-2"><a href="auth-login-cover.html"><i data-feather="chevron-left"></i>
                @lang('Back to login')</a></p> --}}
        </div>
    </div>
    <!-- /Forgot password-->
@endsection
