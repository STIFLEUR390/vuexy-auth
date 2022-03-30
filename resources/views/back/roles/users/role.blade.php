@extends('layouts.app')

@section("header-title")
    @lang('Edit role')
@endsection

@section('title')
    @lang("Edit role")
@endsection

@section('content-header-right')
<a href="{{ route('rol.users.index') }}" class="card-title btn btn-info mb-2">
    <i data-feather='arrow-left'></i>
    @lang('Return')
</a>
@endsection

@section('content')
<div class="content-body">
    <section id="basic-horizontal-layouts">
        <div class="row">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-header">
                            <h4 class="card-title">@lang("Users profile")</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>@lang('Name')</td>
                                        <td>{{ $user->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>@lang('Email')</td>
                                        <td>{{ $user->email }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

           @if ($roles)
                <div class="col-md-12 col-12">
                    <div class="card">
                        <div class="card-header">
                            @lang('Roles')
                        </div>
                        <div class="card-body">
                            @if ($user->roles)
                                <ul>
                                    @foreach ($user->roles as $key => $role)
                                        <li>
                                            <div class="row mt-1">
                                                <div class="col-3">{{ $role->name }}</div>
                                                <div class="col-3">
                                                    <form method="POST" action="{{ route('rol.users.roles.remove', ['role' => $role->id, 'user' => $user->id]) }}">
                                                        @csrf
                                                        @method('DELETE')

                                                        <a href="{{ route('rol.users.roles.remove', ['role' => $role->id, 'user' => $user->id]) }}" type="submit" class="deleteElement" id="rol{{ $key+1 }}"><i data-feather='delete'></i></a>
                                                    </form>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif

                            <hr style="border: 2px rgb(233, 209, 209) solid;"/>

                            <form class="form form-horizontal" method="POST" action="{{ route('rol.users.roles', $user->id) }}">
                                @csrf

                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-1 row">
                                            <div class="col-sm-3">
                                                <label class="col-form-label" for="role">@lang('Select role to assign the user')</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <select class="select2 form-select" name="role" id="role" >
                                                    @foreach ($roles as $role)
                                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('role')
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

           @if ($permissions)
                <div class="col-md-12 col-12">
                    <div class="card">
                        <div class="card-header">
                            @lang('Permissions')
                        </div>
                        <div class="card-body">
                            @if ($user->permissions)
                                <ul>
                                    @foreach ($user->permissions as $key => $permission)
                                        <li>
                                            <div class="row mt-1">
                                                <div class="col-3">{{ $permission->name }}</div>
                                                <div class="col-3">
                                                    <form method="POST" action="{{ route('rol.users.permissions.revoke', ['permission' => $permission->id, 'user' => $user->id]) }}">
                                                        @csrf
                                                        @method('DELETE')

                                                        <a href="{{ route('rol.users.permissions.revoke', ['permission' => $permission->id, 'user' => $user->id]) }}" type="submit" class="deleteElement" id="per{{ $key+1 }}"><i data-feather='delete'></i></a>
                                                    </form>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif

                            <hr style="border: 2px rgb(233, 209, 209) solid;"/>

                            <form class="form form-horizontal" method="POST" action="{{ route('rol.users.permissions', $user->id) }}">
                                @csrf

                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-1 row">
                                            <div class="col-sm-3">
                                                <label class="col-form-label" for="permission">@lang('Select permission to assign the user')</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <select class="select2 form-select" name="permission" id="permission" >
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
