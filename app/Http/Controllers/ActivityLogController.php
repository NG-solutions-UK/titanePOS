<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;

class ActivityLogController extends Controller
{
    /*public function index(ActivityLogDataTable $dataTable)
    {
        return $dataTable->render('activity-logs.index');
    }*/
	
	public function index()
    {
        $logs = ActivityLog::with('user')
            ->latest()
            ->paginate(25);

        return view('activity-logs.index', compact('logs'));
    }

}