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
                <div class="card-header">
                    <div class="dropdown">
                        <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
                            <i class="fas fa-users mr-2"></i>
                            Users
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('users.create') }}">
                                <i class="fas fa-plus mr-2"></i>
                                Add User
                            </a>
                            <a class="dropdown-item" href="{{ route('home') }}">
                                <i class="fas fa-tachometer-alt mr-2"></i>
                                Dashboard
                            </a>
                            <a class="dropdown-item" href="{{ route('users.trashed') }}">
                                <i class="fas fa-trash-alt mr-2"></i>
                                Trashed
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <th>Prefix</th>
                                <th>Name</th>
                                <th>Suffix</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->prefixname }}</td>
                                        <td>{{ $user->fullname }}</td>
                                        <td>{{ $user->suffixname }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            <a href="{{ route('users.show', $user->id) }}" role="button" style="cursor: pointer" data-toggle="tooltip" data-placement="top" title="View">
                                                <i class="fas fa-eye text-success mr-2"></i>
                                            </a>
                                            <a href="{{ route('users.edit', $user->id) }}" role="button" style="cursor: pointer" data-toggle="tooltip" data-placement="top" title="Edit">
                                                <i class="fas fa-edit text-info mr-2"></i>
                                            </a>
                                            <form class="delete" action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" data-toggle="tooltip" data-placement="top" title="Delete" style="border: none; padding: 0; background: none;">
                                                    <i class="fas fa-trash-alt text-danger mr-2"></i>
                                                </button>
                                            </form>
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
                return confirm('Are you sure you want to move this record to trash?');
            });
        });
    </script>
@endsection