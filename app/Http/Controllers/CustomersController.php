<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Customer;

use Response;

class CustomersController extends Controller
{
    public function index(Request $request){

        return Customer::all();
    }

    public function view($id){

        return Customer::find($id) ?? response()->json(["status"=>"Not Found"],404);
    }

    public function create(Request $request){

        //dd($request->all());
        $customer = new Customer();
        $customer->name = $request->get("name");
        $customer->save();

        return $customer;
    }
    public function update(Request $request,$id){

        $customer =  Customer::find($id);

        if(!$customer){
            return response()->json(["status"=>"Not Found"],404);
        }
        $customer->name = $request->get("name");
        $customer->save();

        return $customer;
    }
    public function delete(Request $request,$id){

        $customer =  Customer::find($id);

        if(!$customer){
            return response()->json(["status"=>"Not Found"],404);
        }
        $customer->delete();

        return response()->json(["status"=>"deleted"],200);
    }
}
