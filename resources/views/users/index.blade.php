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
                <div class="card-header">Users</div>

                <div class="card-body">
                    <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">
                        <i class="fas fa-plus"></i>
                        Add User
                    </a>
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