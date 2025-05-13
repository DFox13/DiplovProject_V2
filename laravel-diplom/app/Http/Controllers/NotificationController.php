<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function markAsRead(Request $request, $id)
    {
        $notification = Notification::findOrFail($id);
        
        if ($notification->user_id === Auth::id()) {
            $notification->update(['is_read' => true]);
        }
        return redirect()->back();
        // return response()->json(['success' => true]);
    }
}