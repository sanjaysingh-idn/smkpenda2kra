<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.user', [
            'title'     => 'User',
            'user'      => User::all(),
        ]);
    }

    public function store(Request $request)
    {
        $attr = $request->validate([
            'name'          => 'required|max:255',
            'email'         => 'required|email:dns|max:150|unique:users,email',
            'password'      => 'required|string|min:8|max:255',
        ]);

        $attr['password'] = Hash::make($request->password);
        User::create($attr);

        return back()->with('message', 'Data berhasil ditambah');
    }

    public function update(Request $request, User $user)
    {
        $attr = $request->validate([
            'name'          => 'required|max:255',
            'email'         => 'required|email:dns|max:150|unique:users,email,' . $user->id,
            'password'      => 'required|string|min:8|max:255',
        ]);

        $attr['password'] = Hash::make($request->password);
        $user->update($attr);

        return back()->with('message', 'Data berhasil ditambah');
    }

    public function destroy(User $user)
    {
        User::destroy($user->id);
        return back()->with('message_delete', 'Data berhasil dihapus');
    }
}
