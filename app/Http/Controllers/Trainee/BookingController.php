<?php

namespace App\Http\Controllers\Trainee;

use App\Http\Controllers\Controller;
use App\Models\Class_schedule;
use App\Models\Booking;
use Illuminate\Support\Facades\Validator;


use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        $userId = $request->user()->id; // Get the logged-in user ID
        $bookings = Booking::where('user_id', $userId)->with('class')->get();

        return response()->json($bookings);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'trainer_id' => 'required|exists:trainers,id',
            'class_id' => 'required|exists:classes,id',
            'booking_time' => 'required|date',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Check for scheduling conflicts
        $conflict = Booking::where('class_id', $request->class_id)
            ->where('booking_time', $request->booking_time)
            ->exists();

        if ($conflict) {
            return response()->json(['error' => 'Class is already booked for this time.'], 409);
        }

        // Check class capacity
        $class = Class_schedule::find($request->class_id);
        if ($class->trainee_count >= $class->max_capacity) {
            return response()->json(['error' => 'Class capacity reached.'], 409);
        }

        // Create the booking
        $booking = Booking::create([
            'user_id' => $request->user()->id, // Assuming user ID is in the request context
            'trainer_id' => $request->trainer_id,
            'class_id' => $request->class_id,
            'booking_time' => $request->booking_time,
        ]);

        return response()->json($booking, 201);
    }

    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return response()->json(['message' => 'Booking deleted successfully.']);
    }
}
