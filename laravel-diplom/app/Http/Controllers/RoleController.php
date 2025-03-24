<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    public function manageRoles()
    {
        if (!Auth::user()->canManageRoles()) {
            abort(403, 'У вас нет прав для выполнения этого действия.');
        }

        $users = User::with('role')->get();
        $roles = Role::all();

        return view('admin.manage-roles', compact('users', 'roles'));
    }

    public function updateRole(Request $request, User $user)
    {
        if (!Auth::user()->canManageRoles()) {
            abort(403, 'У вас нет прав для выполнения этого действия.');
        }

        $request->validate([
            'role_id' => 'required|exists:roles,id',
        ]);

        $user->update(['role_id' => $request->role_id]);

        return redirect()->back()->with('success', 'Роль успешно обновлена.');
    }
}