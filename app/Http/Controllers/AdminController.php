<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fund;
use App\Models\Mail;
use App\Models\Chat;
use App\Models\User;
use App\Models\ActivityLog;
use Illuminate\Support\Collection;


class AdminController extends Controller
{
    public function index() {
            $totalUsers = User::count();
            $ongoingFunds = Fund::whereNotIn('approvalStatus', ['finished', 'declined'])->count();
            $totalFunds = Fund::count();
            $totalMails = Mail::count();

            $recentFundingRequests = Fund::where('approvalStatus', 'pending')->latest()->take(3)->get();

            $recentChats = Chat::with(['staff', 'funder'])->latest()->take(5)->get()->map(function ($chat) {
                return [
                    'type' => 'chat',
                    'title' => 'New Chat',
                    'details' => "Chat with {$chat->funder->name} handled by {$chat->staff->name}",
                    'created_at' => $chat->created_at,
                ];
            });

            $recentChatButNotForNotificationPlease = Chat::with(['staff', 'funder'])->where('staff_id', auth()->user()->id)->latest()->take(5)->get();

            $recentMails = Mail::latest()->take(5)->get()->map(function ($mail) {
                return [
                    'type' => 'mail',
                    'title' => 'New Mail',
                    'details' => "Subject: {$mail->title}",
                    'created_at' => $mail->created_at,
                ];
            });

            $recentTickets = Fund::with(['owner'])->where('approvalStatus', 'pending')->latest()->take(5)->get()->map(function ($ticket) {
                return [
                    'type' => 'ticket',
                    'title' => 'New Ticket',
                    'details' => "Fund Name: {$ticket->name} created by {$ticket->owner->name}",
                    'created_at' => $ticket->created_at,
                ];
            });

            $recentNotifications = collect()
                ->merge($recentChats)
                ->merge($recentMails)
                ->merge($recentTickets)
                ->sortByDesc('created_at')
                ->take(5);

            $yourTickets = Chat::with(['staff', 'funder'])->whereNotNull('staff_id')->get();

            $recentActivities = ActivityLog::latest()->take(5)->get();

            return view('admin.dashboard', compact(
                'totalUsers',
                'ongoingFunds',
                'totalFunds',
                'totalMails',
                'recentChatButNotForNotificationPlease',
                'recentFundingRequests',
                'recentNotifications',
                'yourTickets',
                'recentActivities'
            ));

            return view('admin.dashboard', compact('totalUser','totalFund','totalOngoingFund','totalMail','recentFunding','recentNotif','yourTickets','recentActivity'));
    }

    public function activity() {
        $activities = ActivityLog::with('user')->latest()->paginate(10);
        return view('admin.activity', compact('activities'));
    }

    public function notification() {
        $notifChat = Chat::with(['staff', 'funder'])->whereNotNull('staff_id')->latest()->get();
        $notifMail = Mail::where('status', 'pending')->latest()->get();
        $notifFund = Fund::with(['owner'])->where('approvalStatus', 'pending')->latest()->get();
        return view('admin.notification', compact('notifChat', 'notifMail', 'notifFund'));
    }

    public function ticketing() {
        $funds = Fund::with(['owner', 'chat'])->get();
        return view('admin.ticketing', compact('funds'));
    }

    public function userManagement() {
        return view('admin.userManagement');
    }

    public function fundList() {
        return view('admin.fundList');
    }
}
