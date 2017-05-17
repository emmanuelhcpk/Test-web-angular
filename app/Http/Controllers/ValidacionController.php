<?php

namespace App\Http\Controllers;

use App\Validacion;
use Illuminate\Http\Request;
use App\Util;
use App\Archivo;

class ValidacionController extends Controller
{
    public function store(Request $request)
    {   // logica de guardar diccionario y archivo
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

        $posiciones = $array[0];// obtengo las posiciones de nombre y indentificacion
        for ($i = 0; $i < count($posiciones); $i++) {
            if ($posiciones[$i] == 'nombre') {
                $indiceNombre = $i;

            } else if ($posiciones[$i] == 'identificacion') {
                $indiceId = $i;
            }
        }
        // logica de creación de archivos
        if (isset($indiceId) && isset($indiceNombre)) {
            for ($i = 1; $i < count($posiciones); $i++) {
                $palabra = new Validacion();
                $palabra->nombre = $array[$i][$indiceNombre];
                $palabra->indetificacion = $array[$i][$indiceId];
                $palabra->save();
            }
        }


    }
}
