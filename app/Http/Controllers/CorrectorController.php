<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CorrectorController extends Controller
{
    //
    public function corregir(Request $request) {
        
    
        $preguntas=$request;
     //   return $preguntas;
        return view('corrector',compact('preguntas'));
    
    }

}
