@extends('layouts.app')

@section("header-title")
    @lang('Create permission')
@endsection

@section('title')
    @lang("Create permission")
@endsection

@section('content')
<div class="content-body">
    <section id="basic-horizontal-layouts">
        <div class="row">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('permissions.index') }}" class="card-title btn btn-info mb-2">
                            <i data-feather='arrow-left'></i>
                            @lang('Return')
                        </a>
                    </div>
                    <div class="card-body">
                        <form class="form form-horizontal" method="POST" action="{{ route('permissions.store') }}">
                            @csrf

                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-1 row">
                                        <div class="col-sm-3">
                                            <label class="col-form-label" for="name">@lang("Name")</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <input type="text" id="name" class="form-control" name="name" placeholder="@lang('Name')" />
                                            @error('name')
                                                <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-9 offset-sm-3">
                                    <button type="submit" class="btn btn-primary me-1">@lang("Submit")</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
@endsection
