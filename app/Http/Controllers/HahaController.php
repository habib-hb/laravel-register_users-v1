<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Haha;

class HahaController extends Controller
{



    public function haha_number(){
        $list_of_hahas = Haha::all();

        return view('haha_view', ['hahas' => $list_of_hahas]);
    }



}
