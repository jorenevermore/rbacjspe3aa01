<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserInfo;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function manageUsers(){
        $users = User::select('id','name','email')->paginate(10);
        $roles = Role::all();
        $permissions = Permission::all();

        return view('admin.manageUsers')->with(compact('users'));
    }

    public function editUser($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('admin.editUser', compact('user', 'roles'));
    }

    public function updateUser(Request $request, $id)
    {
        $request->validate([
            'role_id' => 'required|exists:roles,id',
        ]);

        $user = User::findOrFail($id);
        $user->roles()->sync([$request->input('role_id')]);

        return redirect()->route('usertool')->with('success', 'User role updated successfully.');
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('usertool')->with('success', 'User deleted successfully.');
    }
}
