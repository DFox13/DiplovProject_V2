<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Callback;
use App\Jobs\SendNotificationJob;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CallbackController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
        ]);

        $callback = Callback::create($validatedData);

        $admins = User::whereHas('role', function ($query) {
            $query->whereIn('name', ['admin', 'system_admin']);
        })->get();

        foreach ($admins as $admin) {
            dispatch(new SendNotificationJob($admin, "Получена новая заявка на обратный звонок от {$callback->name} (Телефон: {$callback->phone})"));
        }

        
    }

    public function listcallback()
    {
        if (!Auth::user()->canManageRoles()) {
            abort(403, 'У вас нет прав для выполнения этого действия.');
        }
        $callbacks = Callback::all();
        return view('admin.callbacks', compact('callbacks'));
    }
}