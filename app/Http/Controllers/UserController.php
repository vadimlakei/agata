<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class UserController extends Controller
{
    public function status(Request $request){
        $user = Auth::user();
        // var_dump($user);
        $user_role = User::find($user->id)->role_id;
        $user_name = $user->name;
        $user_status = false;
        if ($user){
            $user_status = true;
        }
        $data = [
            'role'=>$user_role,
            'name'=>$user_name,
            'status'=>$user_status
        ];

        return $data;
    }

    public function getUsers(){
        $users = User::all();

        return $users;
    }



    //удаляет юзера с нужным айдишником
    public function delUser(Request $request){
        //$request - это все что продается с фронтенда (это date из js)
       $id = $request->id;
       $user_del = User::find($id);
       $user_del->delete();// найти в доках и изучить!
       $message = 'user '.$id.' was delete';

       return $message;
    }

    public function getUser(Request $request){
        $id = $request->id;
        $user = User::find($id);

        return $user;
    }


    public function editUser(Request $request){
        $id = $request->id;
        $input = $request->except('_token');
        // var_dump($input);
        $user = User::find($id);
        $user->fill($input);
        //операция обновления данных!
        if($user->update()){
            $message  = 'Save successfull'; 

            return $message;      
        } else {
            $message  = 'seve error'; 

            return $message;      
        }
        
    }
}
