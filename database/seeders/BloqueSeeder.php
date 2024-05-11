<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class BloqueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
            [
            "nombre"=>"Bloque I",
            "descripcion"=>"Organización del Estado y Administración electrónica"
            ],
            [
            "nombre"=>"Bloque II",
            "descripcion"=>"Tecnología básica"
            ],
            [
            "nombre"=>"Bloque III",
            "descripcion"=>"Desarrollo de sistemas"
            ],
            [
            "nombre"=>"Bloque IV",
            "descripcion"=>"Sistemas y comunicaciones"
            ],
        ];
        DB::table('bloques')->insert($data);
    }
}
