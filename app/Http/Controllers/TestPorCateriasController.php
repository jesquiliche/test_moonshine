<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Bloque;
use App\Models\Categoria;

class TestPorCateriasController extends Controller
{
    public function index()
    {
        $bloques = Bloque::all();
        $categorias = Categoria::select('bloques.nombre', 'categorias.*')
                ->join('bloques', 'bloques.id', '=', 'categorias.bloque_id')
                ->join('preguntas', 'preguntas.categoria_id', '=', 'categorias.id')
                ->distinct()
                ->get();
        return view('test', compact('bloques', 'categorias'));
    }
}
