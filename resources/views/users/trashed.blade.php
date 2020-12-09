@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @if(session('success'))
                <div class="alert alert-success">
                    {!! session('success') !!}
                </div>
            @endif
            <div class="card">
                <div class="card-header">Trashed</div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <th>Prefix</th>
                                <th>First Name</th>
                                <th>Middle Name</th>
                                <th>Last Name</th>
                                <th>Suffix</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->prefixname }}</td>
                                        <td>{{ $user->firstname }}</td>
                                        <td>{{ $user->middlename }}</td>
                                        <td>{{ $user->lastname }}</td>
                                        <td>{{ $user->suffixname }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            Actions
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        $(function() {
            $('.delete').on('submit', function() {
                return confirm('Are you sure you want to deleted this record from the database?');
            });
        });
    </script>
@endsection