<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Haha;

class HahaController extends Controller
{



    public function all_hahas(){
        $list_of_hahas = Haha::all();

        return view('haha_view', ['hahas' => $list_of_hahas]);
    }



    public function haha_store(Request $req){

        $validated_data = $req->validate([
            'laugh' => 'string|required|max:255'
        ]);

        $haha_create = Haha::create(['laugh' => $validated_data['laugh']]);


        if($haha_create){

            return redirect('/haha')->with('message' , 'The haha was uploaded successfully...!!');

        } else {

            return redirect('/haha')->with('message' , 'Alas! You may cry! The data got lost somehow!! ');

        }
    }

}
