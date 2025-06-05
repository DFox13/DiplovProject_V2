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

        return redirect()->route('admin.users')->with('success', 'Discount updated successfully.');
    }

    public function addVisitDate(Request $request)
    {
        if (!Auth::user()->canManageRoles()) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'date' => 'required|date_format:Y-m-d',
        ]);

        $user = Auth::user();
        $visitDates = $user->visit_dates ?? [];

        if (!in_array($request->date, $visitDates)) {
            $visitDates[] = $request->date;
            $user->update(['visit_dates' => $visitDates]);
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'Дата уже добавлена.']);
    }

    public function getVisitDates(User $user)
    {
        $visitDates = $user->visit_dates ?? [];
        $events = [];

        foreach ($visitDates as $date) {
            $events[] = [
                'title' => 'Посещение',
                'start' => $date,
                'color' => 'green'
            ];
        }

        return response()->json($events);
    }
}