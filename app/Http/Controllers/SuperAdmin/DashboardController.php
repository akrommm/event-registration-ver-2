<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Event;
use App\Models\Admin\Ulasan;
use App\Models\Admin\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function __invoke()
    {
        $event = Event::where('status', 1)->count();
        $participantsPerEvent = Event::where('status', 1)
            ->withCount(['registration as total_peserta' => function ($query) {
                $query->where('role', 'Peserta');
            }])
            ->get();

        return view('super-admin.master-data.dashboard.index', compact('event', 'participantsPerEvent'));
    }
}
