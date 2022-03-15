@extends('layouts.guest')

@section('title')
    @lang("Register")
@endsection

@section('script')
    <script src="{{ asset('admin/app-assets/js/scripts/pages/auth-register.min.js') }}"></script>
@endsection

@section('content')
    <!-- Left Text-->
    <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
        <div class="w-100 d-lg-flex align-items-center justify-content-center px-5"><img class="img-fluid"
                src="{{ asset('admin/app-assets/images/pages/register-v2-dark.svg') }}" alt="@lang('Register')" /></div>
    </div>
    <!-- /Left Text-->
    <!-- Register-->
    <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
        <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
            <h2 class="card-title fw-bold mb-1">@lang('Adventure starts here 🚀')</h2>
            <p class="card-text mb-2">@lang("Make your app management easy and fun!")</p>

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form class="auth-register-form mt-2" action="/register" method="POST">
                @csrf
                <div class="mb-1">
                    <label class="form-label" for="name">@lang('Name')</label>
                    <input class="form-control" value="{{ old('name') }}" id="name" type="text" name="name" placeholder="@lang('Name')" aria-describedby="name" autofocus="" tabindex="1" />
                </div>
                <div class="mb-1">
                    <label class="form-label" for="email">@lang('Email')</label>
                    <input class="form-control" id="email" value="{{ old('email') }}" type="email" name="email" placeholder="@lang('Email')" aria-describedby="email" tabindex="2" />
                </div>
                <div class="mb-1">
                    <label class="form-label" for="password">@lang('Password')</label>
                    <div class="input-group input-group-merge form-password-toggle">
                        <input class="form-control form-control-merge" id="password" type="password"
                            name="password" autocomplete="current-password" placeholder="@lang('Password')" aria-describedby="password"
                            tabindex="3" /><span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                    </div>
                </div>
                <div class="mb-1">
                    <label class="form-label" for="password_confirmation">@lang('Confirm Password')</label>
                    <div class="input-group input-group-merge form-password-toggle">
                        <input class="form-control form-control-merge" id="password_confirmation" type="password"
                            name="password_confirmation" autocomplete="current-password" placeholder="@lang('Confirm Password')" aria-describedby="password_confirmation"
                            tabindex="4" /><span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                    </div>
                </div>
                {{-- <div class="mb-1">
                                    <div class="form-check">
                                        <input class="form-check-input" id="register-privacy-policy" type="checkbox"
                                            tabindex="4" />
                                        <label class="form-check-label" for="register-privacy-policy">I agree to<a
                                                href="#">&nbsp;privacy policy & terms</a></label>
                                    </div>
                                </div> --}}
                <x-button>@lang('Sign up')</x-button>
            </form>
            <p class="text-center mt-2"><span>@lang('Already have an account?')</span><a
                    href="/login"><span>&nbsp;@lang("Sign in instead")</span></a></p>
            <div class="divider my-2">
                <div class="divider-text">@lang('or')</div>
            </div>
            <div class="auth-footer-btn d-flex justify-content-center"><a class="btn btn-facebook" href="#"><i
                        data-feather="facebook"></i></a><a class="btn btn-twitter white" href="#"><i
                        data-feather="twitter"></i></a><a class="btn btn-google" href="#"><i data-feather="mail"></i></a><a
                    class="btn btn-github" href="#"><i data-feather="github"></i></a></div>
        </div>
    </div>
    <!-- /Register-->
@endsection
