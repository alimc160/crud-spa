<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use phpDocumentor\Reflection\DocBlock\Tags\Uses;

class UserController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getAllUsers(){
        return view('users');
    }

    /**
     * @return mixed
     */
    public function getUsersList(){
        return User::paginate(10);
    }

    /**
     * @param $id
     * @return string[]
     */
    public function deleteUser($id){
        $user = User::find($id);
        $user->delete();
        return ['status'=>'success','message'=>'User deleted successfully1'];
    }

    public function addUser(Request $request){
        $request->validate([
           'name'=>'required',
           'email'=>'required|unique:users,email',
           'password'=>'required',
        ]);
        $hashPassword = Hash::make($request->password);
        $request->merge([
            'password'=>$hashPassword
        ]);
        $user=User::create($request->all());
        return ['status'=>'success','message'=>'User added successfully1','user'=>$user];
    }

    public function addUserView(){
        return view('add-user');
    }
}
