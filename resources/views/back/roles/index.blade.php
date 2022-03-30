@extends('layouts.app')

@section("header-title")
    @lang('All roles')
@endsection

@section('title')
    @lang("All roles")
@endsection

@section('content-header-right')
    <a href="{{ route('roles.create') }}" class="btn btn-primary">@lang('Create a role')</a>
@endsection

@section('content')
<div class="content-body">
    {{-- <h3>Permissions List</h3>
    <p>Each category (Basic, Professional, and Business) includes the four predefined roles shown below.</p> --}}

    <!-- Permission Table -->
    <div class="card">
        <div class="card-datatable table-responsive mx-2">
            <table class="datatables-basic table">
                <thead class="table-light">
                    <tr>
                        <th>@lang('Name')</th>
                        <th>@lang('Actions')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $key => $role)
                        <tr>
                            <td>{{ $role->name }}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0" data-bs-toggle="dropdown">
                                        <i data-feather="more-vertical"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="{{ route('roles.edit', $role->id) }}">
                                            <i data-feather="edit-2" class="me-50"></i>
                                            <span>@lang("Edit")</span>
                                        </a>
                                        <form action="{{ route('roles.destroy', $role->id) }}" method="post">
                                            @csrf
                                            @method('Delete')

                                            <a class="dropdown-item deleteElement" id="del{{ $key + 1 }}" href="{{ route('roles.destroy', $role->id) }}">
                                                <i data-feather="trash" class="me-50"></i>
                                                <span>@lang("Delete")</span>
                                            </a>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
