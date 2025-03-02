<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\CssSelector\Node\FunctionNode;

class UserController
{
    // show all users
    public function index(){
        $users = User::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.users.list', [
            'users' => $users
        ]);
    }

    // edit user
    public function edit($id){
        $user = User::findOrFail($id); 
        return view('admin.users.edit', ['user' => $user]);
    }

    // update user
    public function update(Request $request, $id){ 
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:5|max:20',
            'email' => 'required|email|unique:users,email,' . $id . ',id',
        ]);

        if ($validator->passes()) {
            $user = User::find($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->mobile = $request->mobile;
            $user->designation = $request->designation;

            $user->save();
            session()->flash('success', 'Profile updated successfully');
            return response()->json([
                'status' => true,
                'errors' => []
            ]);
        }

        return response()->json([
            'status' => false,
            'errors' => $validator->errors()
        ]);
    }

    // delete user
    public function destroy(Request $request){
        $id = $request->id;
        $user = User::find($id);
        if($user == null){
            session()->flash('error', 'User not found.');
            return response()->json([
                'status' => false 
            ]);
        }

        $user->delete();
        session()->flash('success', 'User delete successfully.');
        return response()->json([
            'status' => true 
        ]);
    }
}
