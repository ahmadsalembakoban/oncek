<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PswiplistController extends Controller
{
    public function index() {
        return view('pswiplist.index');
    } 

}
