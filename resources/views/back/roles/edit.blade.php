@extends('layouts.app')

@section("header-title")
    @lang('Edit role')
@endsection

@section('title')
    @lang("Edit role")
@endsection

@section('content')
<div class="content-body">
    <section id="basic-horizontal-layouts">
        <div class="row">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('roles.index') }}" class="card-title btn btn-info mb-2">
                            <i data-feather='arrow-left'></i>
                            @lang('Return')
                        </a>
                    </div>
                    <div class="card-body">
                        <form class="form form-horizontal" method="POST" action="{{ route('roles.update', $role->id) }}">
                            @csrf
                            @method("PUT")

                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-1 row">
                                        <div class="col-sm-3">
                                            <label class="col-form-label" for="name">@lang("Name")</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <input type="text" value="{{ $role->name }}" id="name" class="form-control" name="name" placeholder="@lang('Name')" />
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
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
           @if ($role->permissions)
                <div class="col-md-12 col-12">
                    <div class="card">
                        <div class="card-header">
                            @lang('Permissions')
                        </div>
                        <div class="card-body">
                            <ul>
                                @foreach ($role->permissions as $key => $row)
                                    <li>
                                        <div class="row mt-1">
                                            <div class="col-3">{{ $row->name }}</div>
                                            <div class="col-3">
                                                <form method="POST" action="{{ route('roles.permissions.revoke', ['permission' => $row->id, 'role' => $role->id]) }}">
                                                    @csrf
                                                    @method('DELETE')

                                                    <a href="{{ route('permission.roleRemove', ['permission' => $row->id, 'role' => $role->id]) }}" type="submit" class="deleteElement" id="per{{ $key+1 }}"><i data-feather='delete'></i></a>
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
           @if ($permissions)
                <div class="col-md-12 col-12">
                    <div class="card">
                        <div class="card-header">
                            @lang('Assign a permissions to a role')
                        </div>
                        <div class="card-body">
                            <form class="form form-horizontal" method="POST" action="{{ route('roles.permissions', $role->id) }}">
                                @csrf

                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-1 row">
                                            <div class="col-sm-3">
                                                <label class="col-form-label" for="permissions">@lang("Permission")</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <select class="select2 form-select" name="permission" id="permissions" >
                                                    @foreach ($permissions as $permission)
                                                        <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('permission')
                                                    <div class="invalid-feedback">{{ $message }}</div>
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
