@extends('layouts.app')

@section("header-title")
    @lang('Update Password')
@endsection

@section('title')
    @lang('Update Password')
@endsection

@section('content')

<div class="row">
    <div class="col-12">

    @include('includes.account')

        <!-- security -->

        <div class="card">
            <div class="card-header border-bottom">
                <h4 class="card-title">@lang('Change Password')</h4>
            </div>
            <div class="card-body pt-1">
                <!-- form -->
                @if (session('status') == "password-updated")
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <div class="alert-body">
                            @lang('Password updated successfully.')
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />


                <form class="validate-form" method="POST" action="{{ route('profile.password.update') }}">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-12 col-sm-6 mb-1">
                            <label class="form-label" for="current_password">@lang('Current Password')</label>
                            <div class="input-group form-password-toggle input-group-merge">
                                <input type="password" class="form-control" id="current_password" name="current_password" placeholder="@lang('Enter current password')" autofocus />
                                <div class="input-group-text cursor-pointer">
                                    <i data-feather="eye"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-6 mb-1">
                            <label class="form-label" for="password">@lang("New Password")</label>
                            <div class="input-group form-password-toggle input-group-merge">
                                <input type="password" id="password" name="password" class="form-control" placeholder="@lang('Enter new password')" autocomplete="new-password" />
                                <div class="input-group-text cursor-pointer">
                                    <i data-feather="eye"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 mb-1">
                            <label class="form-label" for="password_confirmation">@lang('Retype New Password')</label>
                            <div class="input-group form-password-toggle input-group-merge">
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="@lang('Confirm your new password')" autocomplete="new-password" />
                                <div class="input-group-text cursor-pointer"><i data-feather="eye"></i></div>
                            </div>
                        </div>
                        <div class="col-12">
                            <p class="fw-bolder">@lang('Password requirements:')</p>
                            <ul class="ps-1 ms-25">
                                <li class="mb-50">@lang('Minimum 8 characters long - the more, the better')</li>
                                <li class="mb-50">@lang('At least one lowercase character')</li>
                                <li>@lang('At least one number, symbol, or whitespace character')</li>
                            </ul>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary me-1 mt-1">@lang('Save changes')</button>
                            <button type="reset" class="btn btn-outline-secondary mt-1">@lang('Discard')</button>
                        </div>
                    </div>
                </form>
                <!--/ form -->
            </div>
        </div>
        <!--/ security -->
    </div>
</div>
@endsection
