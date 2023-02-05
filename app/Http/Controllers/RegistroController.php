<?php

namespace App\Http\Controllers;

use App\Models\Registro;
use Illuminate\Http\Request;

class RegistroController extends Controller
{
    public function create(Request $request)
    {
        #dd($request);

            $array_registro = array(
                "tesis_id" => request()->tesis_id,
                "tecnica_id" => request()->tecnica_id,
                "lugar" => request()->lugar,
                "error_id" => request()->error,
            );


        Registro::insert($array_registro);

        return redirect()->back()->with('alert', 'Nuevo Registro creada correctamente.');
    }

}
