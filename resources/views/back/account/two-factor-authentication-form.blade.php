@extends('layouts.app')

@section("header-title")
    @lang('Two Factor Authentication')
@endsection

@section('title')
    @lang('Two Factor Authentication')
@endsection

@section('content')
<div class="content-body">
    <div class="row">
        <div class="col-12">
        @include('includes.account')

            <!-- two-step verification -->
            <div class="card">
                <div class="card-header border-bottom">
                    <h4 class="card-title">@lang('Two Factor Authentication')</h4>
                </div>
                <div class="card-body my-2 py-25">
                    @if (session('status') == "two-factor-authentication-disabled")
                        <p class="fw-bolder">@lang('Two factor Authentication has been disabled.')</p>

                    @endif

                    @if (session('status') == 'two-factor-authentication-enabled')
                        <p class="fw-bolder">@lang('Two factor Authentication has been enabled.')</p>
                    @endif

                    @if (auth()->user()->two_factor_secret)
                        <form action="/user/two-factor-recovery-codes" class="my-4" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-info">
                                @lang('Regenerate Recovery Codes')
                            </button>
                        </form>
                    @endif

                    <form action="/user/two-factor-authentication" method="POST">
                        @csrf

                        @if (auth()->user()->two_factor_secret)
                            @method('DElETE')

                            <div class="pb-5">
                                {!! auth()->user()->twoFactorQrCodeSvg() !!}
                            </div>

                            <div>
                                <h3>@lang('Recovery Codes:')</h3>

                                <ul>
                                    @foreach ((array) auth()->user()->recoveryCodes() as $code)
                                        <li>{{ $code }}</li>
                                    @endforeach
                                </ul>
                            </div>

                            <button type="submit" class="btn btn-danger">
                                @lang('Disable')
                            </button>
                        @else
                            <button type="submit" class="btn btn-primary" >
                                @lang('Enable')
                            </button>
                        @endif
                    </form>

                </div>
            </div>
            <!-- / two-step verification -->

            <!--/ security -->
        </div>
    </div>

</div>
@endsection
