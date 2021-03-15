<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConfiguracionController extends Controller{

    public function index(){
        $data['page'] = "configuracion";
        return view('configurar',$data);
    }
    
}
