@extends('layouts.app')

@section("header-title")
    @lang('Delete Account')
@endsection

@section('title')
    @lang('Delete Account')
@endsection

@section('content')

@include('includes.account')

<!-- deactivate account  -->
<div class="card">
    <div class="card-header border-bottom">
        <h4 class="card-title">Delete Account</h4>
    </div>
    <div class="card-body py-2 my-25">
        <div class="alert alert-warning">
            <h4 class="alert-heading">Are you sure you want to delete your account?</h4>
            <div class="alert-body fw-normal">
                Once you delete your account, there is no going back. Please be certain.
            </div>
        </div>

        <form id="formAccountDeactivation" class="validate-form" onsubmit="return false">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="accountActivation" id="accountActivation" data-msg="Please confirm you want to delete account" />
                <label class="form-check-label font-small-3" for="accountActivation">
                    I confirm my account deactivation
                </label>
            </div>
            <div>
                <button type="submit" class="btn btn-danger deactivate-account mt-1">Deactivate Account</button>
            </div>
        </form>
    </div>
</div>
<!--/ profile -->
@endsection

