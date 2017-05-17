<?php

namespace App\Http\Controllers;

use App\Diccionario;
use App\Validacion;
use Illuminate\Http\Request;
use App\Util;
use App\Archivo;

class ValidacionController extends Controller
{
    public function store(Request $request)
    {   // logica de guardar diccionario y archivo

        $umbral = $request->input('porcentaje')/100;
        $atributo = $request->input('atributo');
        $file = $request->file('archivo');
        $extension = $file->getClientOriginalExtension();
        \Storage::disk('local')->put($file->getFilename() . '.' . $extension, \File::get($file));
        $archivo = new Archivo();
        $archivo->mime = $file->getClientMimeType();
        $archivo->nombre = $file->getClientOriginalName();
        $archivo->tipo = 'validacion';
        $archivo->filename = $file->getFilename() . '.' . $extension;
        $archivo->save();
        $array = Archivo::csvToArray(storage_path() . '/app/' . $file->getFilename() . '.' . $extension, ',');

        // logica de creación de archivos
        for ($i = 1; $i < count($array); $i++) {
            $palabra = new Validacion();
            $palabra->nombre = $array[$i]['nombre'];
            $palabra->identificacion = $array[$i]['identificacion'];
            $palabra->save();
        }

        //comparacion por nombre o por indetificacion
        $diccionario = Diccionario::all();
        //$validacion = Validacion::all();
        $seleccionadas = [];
        foreach ($array as $wordVal) {

            foreach ($diccionario as $word) {
                $distancia = Util::levenshtein($word[$atributo], $wordVal[$atributo]);
                $porcentaje = 1-($distancia / max(strlen($word[$atributo]), strlen($wordVal[$atributo])));
                if ($porcentaje >= $umbral) {
                    $aux = [];
                    $aux['diccionario'] = $word;
                    $aux['validacion'] = $wordVal;
                    $aux['porcentaje'] = $porcentaje;
                    array_push($seleccionadas, $aux);
                }
            }
        }

        return $seleccionadas;
    }
}
