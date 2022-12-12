<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class SelectController extends Controller
{
    public function select()
    {
        return view('songs/select'); 
    }
}