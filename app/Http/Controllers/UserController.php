<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\User;



use Illuminate\Http\Request;

class UserController extends Controller
{

    public function store(Request $request){

        $validator = Validator::make($request->all(),[
              'name' => ['required'],
              'email' => ['required','email','unique:users,email'],
              'password' => ['required','min:8','confirmed'],
              'role' =>['required','in:admin,trainer,trainee']
              // 'email' => 'required|string|email|unique:gymusers,email',
              // 'password' => 'required|min:8|confirmed',
              // 'password_confirmation'=>'required',
              // 'role' => 'required|in:admin,trainer,trainee', // Validate role input
          ]);
          if($validator->fails()){
              return response()->json($validator->messages(),400);
          }
          else{
              $data = [
                  'name'=> $request->name,
                  'email'=>$request->email,
                  'password'=>$request->password,
                  'role'=>$request->role
              ];
              DB::beginTransaction();
              try{
                  User::create($data);
                  DB::commit();
  
              }
              catch(\Exception $e){
                  DB::rollBack();
                  //p($e->getMessage());
                  $e->getMessage();
  
              }
          }
         // p($request->all());
  
      }
}
