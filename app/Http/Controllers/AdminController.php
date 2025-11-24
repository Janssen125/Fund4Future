<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fund;
use App\Models\Mail;
use App\Models\Chat;
use App\Models\User;
use App\Models\PageAnalytics;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;


class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware(function (Request $request, $next) {
            if (!Auth::check() || !in_array(Auth::user()->role, ['admin', 'staff'])) {
                return redirect()->route('home')->with('message', 'Unauthorized Access');
            }

    //         $lastEntry = PageAnalytics::where('ip_address', $request->ip())
    //         ->where('page_url', $request->fullUrl())
    //         ->where('user_id', Auth::check() ? Auth::id() : null)
    //         ->where('created_at', '>=', now()->subHours(6))
    //         ->latest()
    //         ->first();
    //         if (!$lastEntry || $lastEntry->created_at->diffInHours(now()) >= 6) {
    //             PageAnalytics::create([
    //                 'user_id' => Auth::check() ? Auth::id() : null,
    //                 'ip_address' => $request->ip(),
    //                 'page_url' => $request->fullUrl(),
    //                 'user_agent' => $request->header('User-Agent'),
    //             ]);
    //         };
            return $next($request);
       });
    }


    public function index() {
            $totalUsers = User::count();
            $ongoingFunds = Fund::whereNotIn('approvalStatus', ['finished', 'declined'])->count();
            $totalView = PageAnalytics::count();
            $totalFunds = Fund::count();
            $totalMails = Mail::count();

            $years = PageAnalytics::selectRaw('YEAR(created_at) as year')
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year');

            $fundYears = Fund::selectRaw('YEAR(created_at) as year')
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year');


            $chartLabels = [
                'January', 'February', 'March', 'April', 'May', 'June',
                'July', 'August', 'September', 'October', 'November', 'December'
            ];
            $chartData = [
                PageAnalytics::whereMonth('created_at', 1)->count(),
                PageAnalytics::whereMonth('created_at', 2)->count(),
                PageAnalytics::whereMonth('created_at', 3)->count(),
                PageAnalytics::whereMonth('created_at', 4)->count(),
                PageAnalytics::whereMonth('created_at', 5)->count(),
                PageAnalytics::whereMonth('created_at', 6)->count(),
                PageAnalytics::whereMonth('created_at', 7)->count(),
                PageAnalytics::whereMonth('created_at', 8)->count(),
                PageAnalytics::whereMonth('created_at', 9)->count(),
                PageAnalytics::whereMonth('created_at', 10)->count(),
                PageAnalytics::whereMonth('created_at', 11)->count(),
                PageAnalytics::whereMonth('created_at', 12)->count(),
            ];

            $fundchartLabels = [
                'January', 'February', 'March', 'April', 'May', 'June',
                'July', 'August', 'September', 'October', 'November', 'December'
            ];

            $fundchartData = [
                Fund::whereMonth('created_at', 1)->count(),
                Fund::whereMonth('created_at', 2)->count(),
                Fund::whereMonth('created_at', 3)->count(),
                Fund::whereMonth('created_at', 4)->count(),
                Fund::whereMonth('created_at', 5)->count(),
                Fund::whereMonth('created_at', 6)->count(),
                Fund::whereMonth('created_at', 7)->count(),
                Fund::whereMonth('created_at', 8)->count(),
                Fund::whereMonth('created_at', 9)->count(),
                Fund::whereMonth('created_at', 10)->count(),
                Fund::whereMonth('created_at', 11)->count(),
                Fund::whereMonth('created_at', 12)->count(),
            ];

            $recentFundingRequests = Fund::where('approvalStatus', 'pending')->latest()->take(3)->get();

            $recentChats = Chat::with(['staff', 'funder'])->latest()->take(5)->get()->map(function ($chat) {
                return [
                    'type' => 'chat',
                    'title' => 'New Chat',
                    'details' => "Chat with " . ($chat->funder->name ?? 'Unknown Funder') . " handled by " . ($chat->staff->name ?? 'Unassigned Staff'),
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

            if(Auth::user()->role == 'admin'){
                return view('admin.dashboard', compact(
                    'totalUsers',
                    'totalView',
                    'totalFunds',
                    'totalMails',
                    'recentChatButNotForNotificationPlease',
                    'recentFundingRequests',
                    'recentNotifications',
                    'yourTickets',
                    'recentActivities',
                    'chartLabels',
                    'chartData',
                    'fundchartLabels',
                    'fundchartData',
                    'years',
                    'fundYears'
                ));
            }
            elseif(Auth::user()->role == 'staff'){
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
            }

            // return view('admin.dashboard', compact('totalUser','totalFund','totalOngoingFund','totalMail','recentFunding','recentNotif','yourTickets','recentActivity'));
    }

    public function activity() {
        if(Auth::user()->role != 'admin') {
            return redirect()->route('/')->with('message', "Unauthorized Access");
        }
        else{
            $activities = ActivityLog::with('user')->latest()->paginate(10);
            return view('admin.activity', compact('activities'));
        }
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

    public function pageAnalytics() {
        if(Auth::user()->role != 'admin') {
            return redirect()->route('/')->with('message', "Unauthorized Access");
        }
        else{
            $analytics = PageAnalytics::with('user')->latest()->get();
            return view('admin.websiteAnalytics', compact('analytics'));
        }
    }

    public function viewFilter(Request $request)
    {
        $type = $request->get('type');
        $year = $request->get('year');
        $month = $request->get('month');

        $query = PageAnalytics::query();
        $labels = [];
        $data = [];

        if ($type === 'year' && $year) {
            // Label = months (Jan–Dec)
            $labels = ['January','February','March','April','May','June','July','August','September','October','November','December'];
            for ($i = 1; $i <= 12; $i++) {
                $count = $query->clone()
                    ->whereYear('created_at', $year)
                    ->whereMonth('created_at', $i)
                    ->count();
                $data[] = $count;
            }
        } elseif ($type === 'month' && $year && $month) {
            // Label = days (1–last day of that month)
            $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);
            $labels = range(1, $daysInMonth);
            for ($day = 1; $day <= $daysInMonth; $day++) {
                $count = $query->clone()
                    ->whereYear('created_at', $year)
                    ->whereMonth('created_at', $month)
                    ->whereDay('created_at', $day)
                    ->count();
                $data[] = $count;
            }
        } else {
            // All time (Label = months)
            $labels = ['January','February','March','April','May','June','July','August','September','October','November','December'];
            for ($i = 1; $i <= 12; $i++) {
                $count = PageAnalytics::whereMonth('created_at', $i)->count();
                $data[] = $count;
            }
        }

        return response()->json([
            'labels' => $labels,
            'data' => $data
        ]);
    }

    public function fundFilter($year)
{
    $labels = [
        'January', 'February', 'March', 'April', 'May', 'June',
        'July', 'August', 'September', 'October', 'November', 'December'
    ];

    $data = [];
    for ($month = 1; $month <= 12; $month++) {
        $data[] = Fund::whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->count();
    }

    return response()->json([
        'labels' => $labels,
        'data' => $data,
    ]);
}

}
