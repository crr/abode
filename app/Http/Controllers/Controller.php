<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\User;
use App\Log;
use DB;
use Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function listUsers() {
        if (Auth::User() && Auth::User()->isAdmin()) {
        $users = User::all();

        return view('users')
        ->with('users', $users);
        }

        return redirect('/');
    }

    public function listLogs() {
        if (Auth::User() && Auth::User()->isAdmin()) {

        $logs = Log::select(DB::raw('logs.*'))
            ->orderBy('logs.created_at', 'desc')
            ->paginate(8);
        return view('logs')
        ->with('logs', $logs);
        }

        return redirect('/');
    }
}
