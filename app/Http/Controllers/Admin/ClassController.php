<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Class_schedule;
use Illuminate\Support\Facades\Validator;


class ClassController extends Controller
{
    public function index()
    {
        // Retrieve all class schedules
        $classes = Class_schedule::get();
        return response()->json($classes);
    }


    public function store(Request $request)
    {
        // Validate input
        $validator = Validator::make($request->all(), [
            'trainer_id' => 'required|exists:users,id',
            'date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'capacity' => 'required|integer|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Calculate end time (2 hours later)
        $startTime = $request->start_time;
        $endTime = date('H:i', strtotime($startTime) + 2 * 3600); // 2 hours later

        // Check for class limit and time conflicts
        $trainerId = $request->trainer_id;
        $date = $request->date;

        // Check if the trainer already has 5 classes scheduled on the same day
        $classCount = Class_schedule::where('trainer_id', $trainerId)
            ->where('date', $date)
            ->count();

        if ($classCount >= 5) {
            return response()->json(['error' => 'Maximum of 5 classes per day per trainer.'], 400);
        }

        // Check for time conflicts
        $conflict = Class_schedule::where('trainer_id', $trainerId)
            ->where('date', $date)
            ->where(function ($query) use ($startTime, $endTime) {
                $query->whereBetween('start_time', [$startTime, $endTime])
                      ->orWhereBetween('end_time', [$startTime, $endTime])
                      ->orWhere(function ($query) use ($startTime, $endTime) {
                          $query->where('start_time', '<=', $startTime)
                                ->where('end_time', '>=', $endTime);
                      });
            })
            ->exists();

        if ($conflict) {
            return response()->json(['error' => 'Time conflict with an existing class.'], 400);
        }

        // Create new class schedule
        $classSchedule = Class_schedule::create([
            'trainer_id' => $trainerId,
            'date' => $date,
            'start_time' => $startTime,
            'end_time' => $endTime,
            'capacity' => $request->capacity,
        ]);

        return response()->json($classSchedule, 201);
    }
}




