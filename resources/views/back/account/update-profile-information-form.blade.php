@extends('layouts.app')

@section('header-title')
    @lang('Profile Information')
@endsection

@section('title')
    @lang('Profile Information')
@endsection

@section('script-custom')
    <script>
        $(function () {
            var e = $("#account-upload-img"),
            n = $("#account-upload"),
            c = $(".uploadedAvatar"),
            o = $("#account-reset"),
            if (c) {
                var s = c.attr("src");
                n.on("change", function (t) {
                var n = new FileReader(),
                    c = t.target.files;
                (n.onload = function () {
                    e && e.attr("src", n.result);
                }),
                    n.readAsDataURL(c[0]);
                }),
                o.on("click", function () {
                    c.attr("src", s);
                });
            }
        })
    </script>
@endsection

@section('content')
    @include('includes.account')

    <!-- profile -->
    <div class="card">
        <div class="card-header border-bottom">
            <h4 class="card-title">@lang('Profile Information')</h4>
        </div>
        <div class="card-body py-2 my-25">
            <!-- header section -->
            <a href="javascript:void(0)" class="me-25">
              <img
                src="{{ asset( Auth::user()->img ?? 'img/avatar.jpg') }}"
                id="account-upload-img"
                class="uploadedAvatar rounded me-50"
                alt="profile image"
                height="100"
                width="100"
              />
            </a>
          <!--/ header section -->

            <!-- form -->
            <form class="validate-form mt-2 pt-50" method="POST" action="{{ route('profile.update') }}"
                enctype="multipart/form-data">
                @csrf
                @method("PUT")

                <div class="row">
                    <div class="col-12 col-sm-6 mb-1">
                        <label class="form-label" for="name">@lang('Name')</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="@lang('Name')"
                            value="{{ old('name') ?? auth()->user()->name }}" />
                        @error('name')
                            <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12 col-sm-6 mb-1">
                        <label class="form-label" for="email">@lang("Email")</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                            value="{{ old('email') ?? auth()->user()->email }}" />
                        @error('email')
                            <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12 col-sm-6 mb-1">
                        <label for="formFile" class="form-label">@lang('Profile Image')</label>
                        <input class="form-control" name="img" accept="image/*" type="file" id="formFile" />
                        @error('email')
                            <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary mt-1 me-1">@lang("Update Profile")</button>
                        <button type="reset" class="btn btn-outline-secondary mt-1">@lang('Discard')</button>
                    </div>
                </div>
            </form>
            <!--/ form -->
        </div>
    </div>
    <!--/ profile -->
@endsection
