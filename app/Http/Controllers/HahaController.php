<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Haha;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HahaController extends Controller
{



    public function all_hahas(){
        $list_of_hahas = Haha::all();

        // Performing Personality type data extraction
        if(Auth::check()){
            $current_user_id = Auth::user()->id;


            
            $the_user_personality = DB::select('SELECT personality_string FROM user_personality_store INNER JOIN personality_type ON user_personality_store.personality_type_identifier_int = personality_type.identifier_int WHERE user_personality_store.user_id = ?' , [$current_user_id]);



        }

        return view('haha_view', ['hahas' => $list_of_hahas, 
        'user_personality_type' => $the_user_personality[0]->personality_string ?? 'User Is not logged In.' ]);
    }



    public function haha_store(Request $req){

        try{

            $validated_data = $req->validate([
                'laugh' => 'numeric|required|max:255'
            ]);

        $haha_create = Haha::create(['laugh' => $validated_data['laugh']]);


        if($haha_create){

            return redirect('/haha')->with('message' , 'The haha was uploaded successfully...!!');

        } else {

            return redirect('/haha')->with('message' , 'Alas! You may cry! The data got lost somehow!!');

        }



    } catch(\Exception $e){

        return redirect('/haha')->with('message' , 'Alas! You may cry! The data got lost somehow!!');

    }

    }

}
