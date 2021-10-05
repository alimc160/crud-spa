<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\User;
use Illuminate\Http\Request;
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
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function getUsersList(){
        return UserResource::collection(User::all());
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
        $user=User::create($request->all());
        return ['status'=>'success','message'=>'User added successfully1','user'=>$user];
    }
}
