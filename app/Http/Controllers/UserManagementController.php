<?php

namespace App\Http\Controllers;

use App\Helpers\LogActivity;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserManagementController extends Controller
{
    public function index()
    {
        $user = User::orderBy('id', 'desc')->get();
        return view('components.admin.user-management.index', compact('user'));
    }

    public function create()
    {
        return view('components.admin.user-management.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'name' => ['required', 'string', 'max:255'],
            'username' => 'required',
            'hp' => ['required', 'numeric'],
            'role' => 'required',
            'status' => 'required',
            'password' => ['required', 'string', 'min:8'],
        ]);

        User::create([
            'title' => $request->title,
            'name' => $request->name,
            'username' => $request->username,
            'slug' => Str::slug($request->username),
            'hp' => $request->hp,
            'role' => $request->role,
            'status' => $request->status,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        LogActivity::addToLog('Tambah user');

        return redirect()->route('user-management.index');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('components.admin.user-management.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $request->validate([
            'title' => 'required',
            'name' => ['required', 'string', 'max:255'],
            'username' => 'required',
            'hp' => ['required', 'numeric'],
            'role' => 'required',
            'status' => 'required',
        ]);

        $user->update([
            'title' => $request->title,
            'name' => $request->name,
            'username' => $request->username,
            'slug' => Str::slug($request->username),
            'hp' => $request->hp,
            'role' => $request->role,
            'status' => $request->status,
            'email' => $request->email,
        ]);

        LogActivity::addToLog('Edit user');

        return redirect()->route('user-management.index');
    }

    public function editPassword($id)
    {
        $user = User::findOrFail($id);
        return view('components.admin.user-management.edit-password', compact('user'));
    }

    public function updatePassword(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $request->validate([
            'password' => ['required', 'string', 'min:8'],
        ]);

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        LogActivity::addToLog('Edit password');

        return redirect()->route('user-management.index');
    }
}
