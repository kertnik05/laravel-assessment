@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
                        <i class="fas fa-tachometer-alt mr-2"></i>
                        Dashboard
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('users.index') }}">
                            <i class="fas fa-users mr-2"></i>
                            Users
                        </a>
                        <a class="dropdown-item" href="{{ route('users.create') }}">
                            <i class="fas fa-plus mr-2"></i>
                            Add User
                        </a>
                        <a class="dropdown-item" href="{{ route('users.trashed') }}">
                            <i class="fas fa-trash-alt mr-2"></i>
                            Trashed
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
