<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if (!Auth::user()->canManageRoles()) {
            abort(403, 'Unauthorized action.');
        }

        $query = User::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('name', 'like', '%' . $search . '%')
                  ->orWhere('email', 'like', '%' . $search . '%');
        }

        $users = $query->paginate(10);

        return view('admin.users-list', compact('users'));
    }

    public function edit(User $user)
    {
        if (!Auth::user()->canManageRoles()) {
            abort(403, 'Unauthorized action.');
        }

        return view('admin.user-edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        if (!Auth::user()->canManageRoles()) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'discount' => 'nullable|numeric|min:0|max:100',
        ]);

        $user->update([
            'discount' => $request->input('discount'),
        ]);

        return redirect()->route('users.index')->with('success', 'Discount updated successfully.');
    }
}