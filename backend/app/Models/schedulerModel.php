<?php
namespace App\Models;

use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;
class schedulerModel
{
    public function generateSchedule($activities)
    {
         $rows = DB::table('activities')
                ->where('isCompleted', 0)
                ->orderByDesc('date')
                ->get();

    $schedule = [];

    foreach ($rows as $row) {

        $date = $row->date;

        if (!isset($schedule[$date])) {
            $schedule[$date] = [
                'date' => $date,
                'studyTime' => '0h 0m',
                'activities' => []
            ];
        }

        $schedule[$date]['activities'][] = [
            'name' => $row->name,
            'duration' => $row->duration
        ];
    }

    foreach ($schedule as &$day) {
        $totalMinutes = 0;

        foreach ($day['activities'] as $act) {
            $totalMinutes += $act['duration'];
        }

        $hours = floor($totalMinutes / 60);
        $minutes = $totalMinutes % 60;

        $day['studyTime'] = $hours . 'h ' . $minutes . 'm';
    }

    return array_values($schedule);
    }


    public function activity(Request $request)
    {
       $data = array(
            "name"        => $request->name,
            "duration"    => $request->duration,
            "date"        => $request->date,
            "isCompleted" => false
       );
       
       $duration = DB::table('activities')->where('date',$request->date)->sum('duration');
       $totalDuration = $duration + $request->duration;
       if($totalDuration > 120){
            return response()->json([
                "message" => "Since for selected date activities is getting crossed more than 2 hours/ already crossed 2 hours"
            ]);
       }
       else
        {
            $sql = DB::table("activities")->insert($data);
            if($sql){
                return response()->json([
                    "message" => "Activity created successfully"
                ]);
            } 
        } 
    }
}
?>