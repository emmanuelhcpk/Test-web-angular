<?php

namespace App\Http\Controllers;

use App\Diccionario;
use Illuminate\Http\Request;
use App\Util;
use App\Archivo;

class DiccionarioController extends Controller
{
    //
    public function store(Request $request)
    {   // logica de guardar diccionario y archivo
        $file = $request->file('archivo');
        $extension = $file->getClientOriginalExtension();
        \Storage::disk('local')->put($file->getFilename() . '.' . $extension, \File::get($file));
        $archivo = new Archivo();
        $archivo->mime = $file->getClientMimeType();
        $archivo->nombre = $file->getClientOriginalName();
        $archivo->tipo = 'diccionario';
        $archivo->filename = $file->getFilename() . '.' . $extension;
        $archivo->save();
        $array = Archivo::csvToArray(storage_path() . '/app/' . $file->getFilename() . '.' . $extension, ',');

        // logica de creación de archivos
        for ($i = 0; $i < count($array); $i++) {
            $aux = Diccionario::where('nombre','=',$array[$i]['nombre'])->where('identificacion','=',$array[$i]['identificacion'])->first();
            if(isset($aux)){
                $aux->updated_at = date('Y-m-d G:i:s'); // se actualiza la fecha
                $aux->save();
            }else{
            $palabra = new Diccionario();
            $palabra->nombre = $array[$i]['nombre'];
            $palabra->identificacion = $array[$i]['identificacion'];
            $palabra->save();
            }
        }

        dd($array);


    }

}
