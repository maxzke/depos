<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TpvController extends Controller
{
    public function index(){
        $data['page'] = "terminal";
        return view('tpv',$data);
    }
}
