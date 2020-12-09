<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::paginate(10);
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(StoreUserRequest $request)
    {
        $request = $request->validated();
        if (in_array('photo', $request)) {
            $request['photo'] = $request['photo']->store('images', 'public');
        }
        $request['photo'] = $request['photo']->store('images', 'public');
        User::create($request);
        return back()->with('success', 'User added.');
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $request = $request->validated();
        if (in_array('photo', $request)) {
            $request['photo'] = $request['photo']->store('images', 'public');
        }
        $user->update($request);
        return back()->with('success', 'User updated.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('success', 'User trashed.');
    }

    public function trashed()
    {
        $users = User::withTrashed()->paginate(10);

        return view('users.trashed', compact('users'));
    }
}
