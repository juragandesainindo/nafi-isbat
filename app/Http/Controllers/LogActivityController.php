<?php

namespace App\Http\Controllers;

use App\Helpers\LogActivity;
use Illuminate\Http\Request;

class LogActivityController extends Controller
{
    public function logActivity()
    {
        $logs = LogActivity::logActivityLists();
        return view('components.admin.log-activity.index', compact('logs'));
    }
}
