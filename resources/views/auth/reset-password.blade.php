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

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form class="auth-reset-password-form mt-2" action="auth-login-cover.html" method="POST">

                @csrf
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <div class="mb-1">
                    <label class="form-label" for="email">@lang('Email')</label>
                    <input class="form-control" id="email" type="text" name="email" :value="old('email', $request->email)"
                        placeholder="@lang('Email')" aria-describedby="email" autofocus="" tabindex="1" />
                </div>
                <div class="mb-1">
                    <div class="d-flex justify-content-between">
                        <label class="form-label" for="password">@lang('New Password')</label>
                    </div>
                    <div class="input-group input-group-merge form-password-toggle">
                        <input class="form-control form-control-merge" id="password" type="password" autocomplete="new-password"
                            name="password" placeholder="@lang('New Password')" aria-describedby="password"
                            autofocus="" tabindex="2" /><span class="input-group-text cursor-pointer"><i
                                data-feather="eye"></i></span>
                    </div>
                </div>
                <div class="mb-1">
                    <div class="d-flex justify-content-between">
                        <label class="form-label" for="password_confirmation">@lang("Confirm Password")</label>
                    </div>
                    <div class="input-group input-group-merge form-password-toggle">
                        <input class="form-control form-control-merge" id="password_confirmation" type="password"
                            name="password_confirmation" placeholder="@lang("Confirm Password")" autocomplete="new-password"
                            aria-describedby="password_confirmation" tabindex="3" /><span
                            class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                    </div>
                </div>
                <x-button>@lang('Set new password')</x-button>
            </form>
            <p class="text-center mt-2"><a href="/login"><i data-feather="chevron-left"></i>
                    @lang('Back to login')</a></p>
        </div>
    </div>
    <!-- /Reset password-->
@endsection
