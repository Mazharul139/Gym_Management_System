<?php

namespace App\Http\Controllers\Admin;
use App\Models\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class TrainerController extends Controller
{
    public function index()
    {
       $user= User::where('role','trainer')->get();
       if(count($user)>0){
        $response = [
            'message'=>count($user).'user found',
            'status'=>1,
            'data'=>$user

        ];
       }
        return response()->json($response,200);
    }
    public function store(Request $request)
    {
        // Validate input
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Create a new trainer
        $trainer = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'trainer',
        ]);

        return response()->json($trainer, 201);
    }

    public function update(Request $request, $id)
    {
        $trainer = User::findOrFail($id);
        
        // Validate input
        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|string|email|max:255|unique:users,email,' . $trainer->id,
            'password' => 'sometimes|required|string|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Update trainer information
        $trainer->name = $request->input('name', $trainer->name);
        $trainer->email = $request->input('email', $trainer->email);
        if ($request->filled('password')) {
            $trainer->password = bcrypt($request->password);
        }
        $trainer->save();

        return response()->json($trainer);
    }
    public function destroy($id)
    {
        $trainer = User::findOrFail($id);
        $trainer->delete();
        
        return response()->json(['message' => 'Trainer deleted successfully']);
    }
    


}
