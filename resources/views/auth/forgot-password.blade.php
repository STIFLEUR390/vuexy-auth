@extends('layouts.guest')

@section('title')
    @lang("Forgot Password?")
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
            <h2 class="card-title fw-bold mb-1">@lang("Forgot Password? 🔒")</h2>
            <p class="card-text mb-2">@lang("Enter your email and we'll send you instructions to reset your password")</p>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form class="auth-forgot-password-form mt-2" action="/forgot-password" method="POST">
                @csrf
                <div class="mb-1">
                    <label class="form-label" for="email">@lang('Email')</label>
                    <input class="form-control" id="email" type="email" name="email"
                        placeholder="@lang('Email')" aria-describedby="email" autofocus="" tabindex="1" />
                </div>
                <x-button>@lang('Send reset link')</x-button>
            </form>
            <p class="text-center mt-2"><a href="/login"><i data-feather="chevron-left"></i>
                    @lang('Back to login')</a></p>
        </div>
    </div>
    <!-- /Forgot password-->
@endsection
