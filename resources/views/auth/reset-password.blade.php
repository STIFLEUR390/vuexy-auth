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
                src="{{ asset('admin/app-assets/images/pages/reset-password-v2-dark.svg') }}"
                alt="@lang('Reset Password')" /></div>
    </div>
    <!-- /Left Text-->
    <!-- Reset password-->
    <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
        <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
            <h2 class="card-title fw-bold mb-1">@lang('Reset Password 🔒')</h2>
            <p class="card-text mb-2">@lang('Your new password must be different from previously used passwords')</p>
            <form class="auth-reset-password-form mt-2" action="auth-login-cover.html" method="POST">
                <div class="mb-1">
                    <div class="d-flex justify-content-between">
                        <label class="form-label" for="reset-password-new">@lang('New Password')</label>
                    </div>
                    <div class="input-group input-group-merge form-password-toggle">
                        <input class="form-control form-control-merge" id="reset-password-new" type="password"
                            name="reset-password-new" placeholder="············" aria-describedby="reset-password-new"
                            autofocus="" tabindex="1" /><span class="input-group-text cursor-pointer"><i
                                data-feather="eye"></i></span>
                    </div>
                </div>
                <div class="mb-1">
                    <div class="d-flex justify-content-between">
                        <label class="form-label" for="reset-password-confirm">@lang("Confirm Password")</label>
                    </div>
                    <div class="input-group input-group-merge form-password-toggle">
                        <input class="form-control form-control-merge" id="reset-password-confirm" type="password"
                            name="reset-password-confirm" placeholder="············"
                            aria-describedby="reset-password-confirm" tabindex="2" /><span
                            class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                    </div>
                </div>
                <button class="btn btn-primary w-100" tabindex="3">@lang('Set new password')</button>
            </form>
            <p class="text-center mt-2"><a href="auth-login-cover.html"><i data-feather="chevron-left"></i>
                    @lang('Back to login')</a></p>
        </div>
    </div>
    <!-- /Reset password-->
@endsection
