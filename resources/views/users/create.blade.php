@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(session('success'))
                <div class="alert alert-success">
                    {!! session('success') !!}
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <div class="dropdown">
                        <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
                            <i class="fas fa-plus mr-2"></i>
                            Add User
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
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
                        @csrf

                        {{-- Prefix name --}}
                        <div class="form-group row">
                            <label for="prefixname" class="col-md-4 col-form-label text-md-right">Prefix Name</label>

                            <div class="col-md-6">
                                <select id="prefixname" class="form-control" name="prefixname">
                                    <option value="">Prefix</option>
                                    <option value="Mr">Mr</option>
                                    <option value="Ms">Ms</option>
                                    <option value="Mrs">Mrs</option>
                                </select>
                            </div>
                        </div>
                        
                        {{-- First name --}}
                        <div class="form-group row">
                            <label for="firstname" class="col-md-4 col-form-label text-md-right">First Name</label>

                            <div class="col-md-6">
                                <input 
                                    id="firstname" 
                                    type="text" 
                                    class="form-control @error('firstname') is-invalid @enderror" 
                                    name="firstname" value="{{ old('firstname') }}" 
                                    required autocomplete="firstname" autofocus
                                />

                                @error('firstname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        {{-- Middle name --}}
                        <div class="form-group row">
                            <label for="middlename" class="col-md-4 col-form-label text-md-right">Middle Name</label>

                            <div class="col-md-6">
                                <input 
                                    id="middlename" 
                                    type="text" 
                                    class="form-control" 
                                    name="middlename" value="{{ old('middlename') }}" 
                                    autofocus
                                />
                            </div>
                        </div>
                        
                        {{-- Last Name --}}
                        <div class="form-group row">
                            <label for="lastname" class="col-md-4 col-form-label text-md-right">Last Name</label>

                            <div class="col-md-6">
                                <input 
                                    id="lastname" 
                                    type="text" 
                                    class="form-control @error('lastname') is-invalid @enderror" 
                                    name="lastname" value="{{ old('lastname') }}" 
                                    required autocomplete="lastname" autofocus
                                />

                                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Suffix name --}}
                        <div class="form-group row">
                            <label for="suffixname" class="col-md-4 col-form-label text-md-right">Suffix Name</label>

                            <div class="col-md-6">
                                <input 
                                    id="suffixname" 
                                    type="text" 
                                    class="form-control" 
                                    name="suffixname" value="{{ old('suffixname') }}" 
                                    autofocus
                                />
                            </div>
                        </div>

                        {{-- Username --}}
                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">Username</label>

                            <div class="col-md-6">
                                <input 
                                    id="username" 
                                    type="text" 
                                    class="form-control @error('username') is-invalid @enderror" 
                                    name="username" value="{{ old('username') }}" 
                                    required autocomplete="username" autofocus
                                />

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Email --}}
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Password --}}
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Confirm Password --}}
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        {{-- Photo --}}
                        <div class="form-group row">
                            <label for="photo" class="col-md-4 col-form-label text-md-right">Photo</label>
                            <div class="col-md-6">
                                <input type="file" id="photo" name="photo" class="form-control-file">
                            </div>

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        {{-- Submit Button --}}
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
