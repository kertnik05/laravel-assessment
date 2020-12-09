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
        if ($request->hasFile('photo')) {
            User::create([
                'prefixname' => $request->prefixname,
                'firstname' => $request->firstname,
                'middlename' => $request->middlename,
                'lastname' => $request->lastname,
                'suffixname' => $request->suffixname,
                'username' => $request->username,
                'email' => $request->email,
                'password' => $request->password,
                'photo' => $request->photo->store('images', 'public')
            ]);
        } else {
            User::create($request->validated());
        }
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
        if ($request->hasFile('photo')) {
            $user->update([
                'prefixname' => $request->prefixname,
                'firstname' => $request->firstname,
                'middlename' => $request->middlename,
                'lastname' => $request->lastname,
                'suffixname' => $request->suffixname,
                'username' => $request->username,
                'email' => $request->email,
                'password' => $request->password,
                'photo' => $request->photo->store('images', 'public')
            ]);
        } else {
            $user->update($request->validated());
        }
        return back()->with('success', 'User updated.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('success', 'User moved to trash.');
    }

    public function trashed()
    {
        $users = User::onlyTrashed()->paginate(10);

        return view('users.trashed', compact('users'));
    }

    public function restore($id)
    {
        $user = User::withTrashed()->findOrFail($id);
        $user->restore();
        return back()->with('success', 'User restored.');
    }
}
