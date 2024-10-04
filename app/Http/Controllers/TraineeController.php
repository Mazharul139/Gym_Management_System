<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;



use Illuminate\Http\Request;

class TraineeController extends Controller
{
    public function TraineeDashboard()
    {
        $booking = Booking::all();
        $trainee_id = Auth::id();
        $trainee_chk=User::where('id',$trainee_id)->get();

        return view('trainee.trainee_dashboard',compact('trainee_chk','booking'));
    }
    public function EditTrainee($id){
        $traine_id = User::findOrFail($id);
        return view('trainee.edit_trainee',compact('traine_id'));
    }
    public function UpdateTrainee(Request $request){
        $tran_id = $request->id;
        User::findOrFail($tran_id)->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'role'=>'trainee',

        ]);
        return redirect()->route('trainee.dashboard');
    }
    public function TraineeLogout(){
        Auth::logout(); // Logs out the authenticated user
        return redirect('/');
    }
    public function DeleteTrainee($id){
        User::findOrFail($id)->delete();
        return redirect('/');

    }

    //class booking controller

    public function AddBooking(){
        return view('trainee.add_booking');
    }
    public function StoreBooking(Request $request){

        Booking::insert([

            'trainer_id'=>$request->trainer_id,
            'class_id'=>$request->class_id,
            'booking_time'=>$request->booking_time,


        ]);
        return redirect()->route('trainee.dashboard');
    }
    public function EditBooking($id){
        $book_id = Booking::findOrFail($id);
        return view('trainee.edit_booking',compact('book_id'));
    }
    public function UpdateBooking(Request $request){
        $b_id = $request->id;
        Booking::findOrFail($b_id)->update([
            'trainer_id'=>$request->trainer_id,
            'class_id'=>$request->class_id,
            'booking_time'=>$request->booking_time,
        

        ]);
        return redirect()->route('trainee.dashboard');
    }
    public function DeleteBooking($id){
        Booking::findOrFail($id)->delete();
        return redirect()->route('trainee.dashboard');

    }


}
