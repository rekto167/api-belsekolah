<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Day;
use App\Models\Schedule;
use Exception;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;

class BelController extends Controller
{
    // DAY
    // GET
    public function getDays(){
        try {
            $days = Day::all();
            return ResponseFormatter::success([
                $days
            ],'Get data days success!');
        } catch (Exception $error) {
            return response()->json($error,500);
        }
    }
    // CREATE
    public function createDay(Request $request){
        try {
            $request->validate([
                'name'=>'required'
            ]);

            $day = Day::create([
                'name'=>$request->name
            ]);

            return ResponseFormatter::success([
                'data'=>$day
            ],'Add day successfully!');
        } catch (Exception $error) {
            return response()->json($error,500);
        }
    }
    // DELETE
    public function deleteDay(Day $id){
        try {
            $id->delete();

            return ResponseFormatter::success([
                'data'=>$id
            ],'This day was deleted!');
        } catch (Exception $error) {
            return response()->json($error,500);
        }
    }
    // DAY

    // ACTIVITY
    // GET
    public function getActivities(){
        try {
            $activities = Activity::all();
            return ResponseFormatter::success([
                $activities
            ],'Fetch activities successfully!');
        } catch (Exception $error) {
            return response()->json($error,500);
        }
    }
    // CREATE
    public function createActivity(Request $request){
        try {
            $request->validate([
                'name'=>'required'
            ]);

            $activity = Activity::create([
                'name'=>$request->name
            ]);

            return ResponseFormatter::success([
                'data'=>$activity
            ],'Add activity was successfully!');
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'error'=>$error,
            ],'Something wrong bro!');
        }
    }
    // DELETE
    public function deleteActivity($id){
        try {
            $activity = Activity::find($id);

            $activity->delete();

            return ResponseFormatter::success([
                'data'=>$activity
            ],'Activity delete successfully!');
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'error'=>$error,
            ],'Something wrong bro!');
        }
    }
    // ACTIVITY

    // SCHEDULE
    // GET
    public function getSchedules()
    {
        try {
            $schedules = Schedule::all();
            return ResponseFormatter::success([
                'data'=>$schedules
            ],'Fetch schedule successfully.');
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'error'=>$error->getMessage()
            ],'Something wrong.');
        }
    }
    // GET DETAIL
    public function getSchedule($id)
    {
        try {
            $schedule = Schedule::find($id);
            return ResponseFormatter::success([
                'data'=>$schedule
            ],'Fetch schedule detail successfully.');
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'error'=>$error->getMessage()
            ],'Something wrong.');
        }
    }
    //ADD POST
    public function addSchedule(Request $request)
    {
        try {
            $request->validate([
                'day_id' => 'required|integer',
                'activity_id' => 'required|integer',
                'time'=>'required|string'
            ]);

            $schedule = Schedule::create([
                'day_id' => $request->day_id,
                'activity_id'=>$request->activity_id,
                'time'=>$request->time
            ]);

            return ResponseFormatter::success([
                $schedule
            ],'Add schedule successfully!');
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'error'=>$error->getMessage()
            ],'Something wrong.');
        }
    }
    // CREATE
    // DELETE
    // UPDATE
    // SCHEDULE
}
