@extends('layouts.app')

@section("header-title")
    @lang('Edit permission')
@endsection

@section('title')
    @lang("Edit permission")
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
                        <form class="form form-horizontal" method="POST" action="{{ route('permissions.update', $permission->id) }}">
                            @csrf
                            @method("PUT")

                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-1 row">
                                        <div class="col-sm-3">
                                            <label class="col-form-label" for="name">@lang("Name")</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <input type="text" value="{{ $permission->name }}" id="name" class="form-control" name="name" placeholder="@lang('Name')" />
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
           @if ($permission->roles)
                <div class="col-md-12 col-12">
                    <div class="card">
                        <div class="card-header">
                            @lang('Roles')
                        </div>
                        <div class="card-body">
                            <ul>
                                @foreach ($permission->roles as $key => $row)
                                    <li>
                                        <div class="row mt-1">
                                            <div class="col-3">{{ $row->name }}</div>
                                            <div class="col-3">
                                                <form method="POST" action="{{ route('permission.roleRemove', ['permission' => $permission->id, 'role' => $row->id]) }}">
                                                    @csrf
                                                    @method('DELETE')

                                                    <a href="{{ route('permission.roleRemove', ['permission' => $permission->id, 'role' => $row->id]) }}" type="submit" class="deleteElement" id="rol{{ $key+1 }}"><i data-feather='delete'></i></a>
                                                </form>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
           @endif
           @if ($roles)
                <div class="col-md-12 col-12">
                    <div class="card">
                        <div class="card-header">
                            @lang('Assign a role to a permission')
                        </div>
                        <div class="card-body">
                            <form class="form form-horizontal" method="POST" action="{{ route('permissions.roles', $permission->id) }}">
                                @csrf

                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-1 row">
                                            <div class="col-sm-3">
                                                <label class="col-form-label" for="roles">@lang("Roles")</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <select class="select2 form-select" name="roles[]" id="select2-multiple" multiple>
                                                    @foreach ($roles as $role)
                                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('roles')
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
           @endif
        </div>
    </section>

</div>
@endsection
