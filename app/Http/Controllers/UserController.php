<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('role')->get();
        $roles = Role::all();
        return view('admin.pengguna.index', compact(['users', 'roles']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role' => 'required|string',
            'phone' => 'required|string|min:10|unique:users',
        ], [
            'username.unique' => 'Nama pengguna sudah terdaftar..',
            'password.min' => 'Password minimal 8 karakter'
        ]);

        User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'phone' => $request->phone,
        ]);

        return redirect()->route('pengguna.index')->with('success', 'Pengguna baru berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        // $roles = Role::all();
        // return view('admin.pengguna.index', compact('user', 'roles'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.pengguna.index', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $username)
    {
        $request->validate([
            'password' => 'required|string|min:8',
            'role' => 'required|string',
            'phone' => 'required|string|min:10',
        ]);

        $hashedPassword = Hash::make($request->password);

        User::where('username', $username)->update([
            'password' => $hashedPassword,
            'role' => $request->role,
            'phone' => $request->phone,
        ]);

        return redirect()->route('pengguna.index')->with('success', 'Pengguna berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('pengguna.index')->with('success', 'Pengguna berhasil dihapus.');
    }
}
