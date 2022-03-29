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
        <h4 class="card-title">@lang("Delete Account")</h4>
    </div>
    <div class="card-body py-2 my-25">
        <div class="alert alert-warning">
            <h4 class="alert-heading">@lang("Are you sure you want to delete your account?")</h4>
            <div class="alert-body fw-normal">
                @lang("Once you delete your account, there is no going back. Please be certain.")
            </div>
        </div>

        <form method="POST" action="{{ route('profile.account.delete') }}">
            @csrf
            @method('DELETE')
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="accountActivation" id="accountActivation" data-msg="Please confirm you want to delete account" />
                <label class="form-check-label font-small-3" for="accountActivation">
                    @lang("I confirm my account deletion")
                </label>
            </div>
            <div>
                <button type="submit" class="btn btn-danger deactivate-account mt-1">@lang("Delete Account")</button>
            </div>
        </form>
    </div>
</div>
<!--/ profile -->
@endsection

