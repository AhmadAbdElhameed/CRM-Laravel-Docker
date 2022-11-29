<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UsersController extends Controller
{
    public function index(){
        return "home";
    }

    public function check(Request $request,$name){
        //return User::all();
        // return User::find(2);
        //$id = $request->get('id',"null");
        // return User::find($id);
        return User::where('name',$name)->get();
    }

    public function add(Request $request){
        $user = new User();
        $user->name = "kareem";
        $user->password = "9652413";
        $user->email = 'kareem@gmail.com';

        $user->save();
    }

    public function update(Request $request){
        $user = User::find(2);
        $user->name = "mohamed";
        $user->password = "9652413";
        $user->email = 'mohamed@yahoo.com';

        $user->save();
        return $user ;
    }
    public function list(){
        return User::all();
        //return $request;
    }
    public function find($id){
        return User::find($id);
    }
    public function delete($id){
        $user = User::find($id);
        $user->delete();
        echo "user deleted";

    }
}
