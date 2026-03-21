<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\schedulerModel;

class ScheduleController extends Controller
{
    public function generate(Request $request, schedulerModel $service)
    {
        $activities = $request->input('activities');

        $result = $service->generateSchedule($activities);

        return response()->json($result);
    }

    public function  insertActivity(Request $request) {
         $schedule = new schedulerModel();
         $result = $schedule->activity($request);  
         return $result;    
    }
}

