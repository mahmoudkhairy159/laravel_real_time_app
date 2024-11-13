<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function markAllAsRead(Request $request)
    {
        $user = auth()->guard('admin')->user();
        if ($user) {
            // Mark all notifications as read
            $user->unreadNotifications->markAsRead();
        }

        return response()->json(['message' => 'Notifications marked as read']);
    }

    // Delete all notifications
    public function deleteAll(Request $request)
    {
        $user = auth()->guard('admin')->user();
        if ($user) {
            // Delete all notifications
            $user->notifications()->delete();
        }

        return response()->json(['message' => 'All notifications deleted']);
    }
}
