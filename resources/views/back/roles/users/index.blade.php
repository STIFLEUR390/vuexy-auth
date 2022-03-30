@extends('layouts.app')

@section("header-title")
    @lang('All users')
@endsection

@section('title')
    @lang("All users")
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
                        <th>@lang('Email')</th>
                        <th>@lang('Action')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $key => $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0" data-bs-toggle="dropdown">
                                        <i data-feather="more-vertical"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="{{ route('rol.users.show', $user->id) }}">
                                            <i data-feather='eye' class="me-50"></i>
                                            <span>@lang("Show")</span>
                                        </a>
                                        <form action="{{ route('rol.users.destroy', $user->id) }}" method="post">
                                            @csrf
                                            @method('Delete')

                                            <a class="dropdown-item deleteElement" id="del{{ $key + 1 }}" href="{{ route('rol.users.destroy', $user->id) }}">
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
