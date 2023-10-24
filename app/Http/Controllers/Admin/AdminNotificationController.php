<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminNotificationController extends Controller
{
    public function markAllNotificationsAsRead(){
        Auth::user()->unreadNotifications->markAsRead();

        return redirect()->back()->with('success', 'All notifications marked as read');
    }
    public function markNotificationAsRead($id){
        $notification = Auth::user()->notifications()->find($id);

        if($notification){
            $notification->markAsRead();
        }

        return redirect()->back()->with('success', 'Notification marked as read');
    }
}
