<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Day;
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

            return response()->json($day);
        } catch (Exception $error) {
            return response()->json($error,500);
        }
    }
    // DELETE
    public function deleteDay(Day $id){
        try {
            $id->delete();

            // return Response::json([
            //     'message'=>$id->name.'was deleted'
            // ],200);
        } catch (Exception $error) {
            return response()->json($error,500);
        }
    }
    // DAY

    public function getActivities(){
        try {
            $activities = Activity::all();
            return response()->json($activities);
        } catch (Exception $error) {
            return response()->json($error,500);
        }
    }
}
