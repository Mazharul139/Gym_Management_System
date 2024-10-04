<?php

namespace App\Http\Controllers;

use App\Models\Class_schedule;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function AdminDashboard()
    {
        $trainer = User::where('role','trainer')->get();
        $class = Class_schedule::all();
        return view('admin.admin_dashboard',compact('trainer','class'));
    }

    public function AddTrainer(){
        return view('trainer.add_trainer');
    }

    public function StoreTrainer(Request $request){
        //dd($request->all());
        User::insert([

            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'role'=>'trainer',


        ]);
        return redirect()->route('admin.dashboard');
    }

    public function EditTrainer($id){
        $trainer_id = User::findOrFail($id);
        return view('trainer.edit_trainer',compact('trainer_id'));
    }

    public function UpdateTrainer(Request $request){
        $tra_id=  $request->id;
        User::findOrFail($tra_id)->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'role'=>'trainer',

        ]);
        return redirect()->route('admin.dashboard');
    }
    public function DeleteTrainer($id){
        User::findOrFail($id)->delete();
        return redirect()->route('admin.dashboard');

    }
    //class logic

    public function AddClass()
    {
        return view('class.add_class');
    }

    public function StoreClass(Request $request) {

        $date= $request->input('date');
        $count = Class_schedule::where('date', $date)->count();
        if($count<=5){

        Class_schedule::insert([

            'trainer_id'=>$request->trainer_id,
            'date'=>$request->date,
            'start_time'=>$request->start_time,
            'end_time'=>$request->end_time,
            'capacity'=>$request->capacity,


        ]);
        return redirect()->route('admin.dashboard');
    }
    else{
        return p("Maximum 5 Classes Per Day");
    }
    }

    public function EditClass($id){
        $cls_id = Class_schedule::findOrFail($id);
        return view('class.edit_class',compact('cls_id'));
    }

    public function UpdateClass(Request $request){
        $class_id=  $request->id;
        Class_schedule::findOrFail($class_id)->update([
            'trainer_id'=>$request->trainer_id,
            'date'=>$request->date,
            'start_time'=>$request->start_time,
            'end_time'=>$request->end_time,
            'capacity'=>$request->capacity,


        ]);
        return redirect()->route('admin.dashboard');
    }

    public function DeleteClass($id){
        Class_schedule::findOrFail($id)->delete();
        return redirect()->route('admin.dashboard');

    }
    public function AdminLogout(){
        Auth::logout(); // Logs out the authenticated user
        return redirect('/');
    }


}
