<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        confirmDelete('Delete User!', 'Are you sure you want to delete?');
        return view('auth.admin.user', compact('users'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'role' => 'required',
        ]);
        $validate['password'] = bcrypt($validate['password']);
        $user = User::create($validate);
        if ($user) {
            ALert::success('Success', 'Create new user successfully!');
        } else {
            Alert::error('Failed', 'Create new user failed!');
        }
        return redirect()->route('admin-user');
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required',
        ]);
        $user = User::where('id', $id)->update($validate);
        if ($user) {
            Alert::success('Success', 'Update user successfully!');
        } else {
            Alert::error('Failed', 'Update user failed!');
        }
        return redirect()->route('admin-user');
    }

    public function delete($id)
    {
        $user = User::where('id', $id)->delete();
        if ($user) {
            Alert::success('Success', 'Delete user successfully!');
        } else {
            Alert::error('Failed', 'Delete user failed!');
        }
        return redirect()->route('admin-user');
    }
}
