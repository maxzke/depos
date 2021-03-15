<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VentaController extends Controller
{
    public function index(){
        $data['page'] = "ventas";
        return view('ventas',$data);
    }
}
