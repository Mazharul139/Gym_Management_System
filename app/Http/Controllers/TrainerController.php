<?php

namespace App\Http\Controllers;

use App\Models\Class_schedule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TrainerController extends Controller
{
    public function TrainerDashboard()
    {
        $train_id = Auth::id();
        $train_class = Class_schedule::where('trainer_id',$train_id)->get();
        //dd($train_class);
        return view('trainer.trainer_dashboard',compact('train_class'));
    }
    public function TrainerLogout(){
        Auth::logout(); // Logs out the authenticated user
        return redirect('/');
    }
}
