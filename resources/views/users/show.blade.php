@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header">
                <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
                    <i class="fas fa-user mr-2"></i>
                    User details
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ route('home') }}">
                        <i class="fas fa-tachometer-alt mr-2"></i>
                        Dashboard
                    </a>
                    <a class="dropdown-item" href="{{ route('users.index') }}">
                        <i class="fas fa-users mr-2"></i>
                        Users
                    </a>
                    <a class="dropdown-item" href="{{ route('users.trashed') }}">
                        <i class="fas fa-trash-alt mr-2"></i>
                        Trashed
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <tbody>
                            <tr>
                                <td colspan="2">
                                    <img src="{{ asset($user->avatar) }}" alt="User Photo">
                                </td>
                            </tr>
                            <tr>
                                <th>Prefix</th>
                                <td>{{ $user->prefixname }}</td>
                            </tr>
                            <tr>
                                <th>First Name</th>
                                <td>{{ $user->firstname }}</td>
                            </tr>
                            <tr>
                                <th>Middle Name</th>
                                <td>{{ $user->middlename }}</td>
                            </tr>
                            <tr>
                                <th>Last Name</th>
                                <td>{{ $user->lastname }}</td>
                            </tr>
                            <tr>
                                <th>Suffix</th>
                                <td>{{ $user->suffixname }}</td>
                            </tr>
                            <tr>
                                <th>Username</th>
                                <td>{{ $user->username }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $user->email }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{-- {{ $user }} --}}
</div>
@endsection