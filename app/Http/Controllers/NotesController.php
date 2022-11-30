<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Response;
use App\Models\Note;

class NotesController extends Controller
{
    public function index(Request $request,$customer_id){

        return Note::where("customer_id",$customer_id)->get();
    }

    public function view($id){

        return Note::find($id) ?? response()->json(["status"=>"Not Found"],404);
    }

    public function create(Request $request,$customer_id){

        //dd($request->all());
        $note = new Note();
        $note->note = $request->get("note");
        $note->customer_id = $customer_id;
        $note->save();

        return $note;
    }
    public function update(Request $request,$customer_id,$id){

        $note =  Note::find($id);

        //dd($note->customer_id,$customer_id);
        $customer_id = (int)$customer_id;

        if(!$note){
            return response()->json(["status"=>"Not Found"],404);
        }

        if($note->customer_id !== $customer_id){
            return response()->json(["status"=>"Invalid Data"],404);
        }



        $note->note = $request->get("note");
        $note->save();

        return $note;
    }
    public function delete(Request $request,$customer_id,$id){

        $note =  Note::find($id);
        //dd($note->customer_id,$customer_id);
        $customer_id = (int)$customer_id;
        // if($note->customer_id === $customer_id){
        //     echo "true";
        // }
        //dd($note->customer_id,$customer_id);
        if(!$note){
            return response()->json(["status"=>"Not Found"],404);
        }

        if($note->customer_id !== $customer_id){
            return response()->json(["status"=>"Invalid Data"],404);
        }

        $note->delete();

        return response()->json(["status"=>"deleted"],200);
    }
}
