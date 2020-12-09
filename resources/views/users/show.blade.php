@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header">User details</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <tbody>
                            <tr>
                                <td colspan="2">
                                    <img src="{{ asset($user->photo) }}" alt="User Photo">
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