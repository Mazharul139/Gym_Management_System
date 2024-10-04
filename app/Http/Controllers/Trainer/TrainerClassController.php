<?php

namespace App\Http\Controllers\Trainer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Class_schedule;

class TrainerClassController extends Controller
{
    public function index(Request $request)
    {
        // Get the trainer_id from the request header
        $trainerId = $request->header('trainer-id');

        // Validate that the trainer ID is present
        if (!$trainerId) {
            return response()->json(['error' => 'Trainer ID is required.'], 400);
        }

        // Fetch classes associated with the trainer
        $classes = Class_schedule::where('trainer_id', $trainerId)
            ->select('id', 'class_name', 'trainee_count')
            ->get();

        // Return the classes as a JSON response
        return response()->json($classes);
    }
}

