<?php

namespace App\Http\Controllers;

use App\Models\Tecnica;
use Illuminate\Http\Request;

class TecnicaController extends Controller
{
    public function analizar($tesis_id)
    {
        #Jala los datos de la investigación que queremos analizar
        $investigacion  = \DB::table('investigacions')->where('tesis_id',  $tesis_id)->get();
        $investigacion = json_decode($investigacion, true);

        #Jala todas las tecnicas disponibles en la tabla de TECNICAS
        $tecnicas  = \DB::table('tecnicas')->get();
        $tecnicas = json_decode($tecnicas, true);

        #Jala todas las registros disponibles en la tabla de REGISTROS
        $registros  = \DB::table('registros')->where('tesis_id',  $tesis_id)->get();
        $registros = json_decode($registros, true);

        #Jala la revisión
        $revisado = \DB::table('revisados')->where('tesis_id',  $tesis_id)->get();
        $revisado = json_decode($revisado, true);

        #Esto para agregar al array de registros el nombre de la tecnica en función del ID
        foreach($registros as $rk=>$rv) {
            foreach($tecnicas as $tk => $tv) {
                if($rv['tecnica_id']==$tv['tecnica_id']){
                    $name = $tv['tecnica_name'];
                    array_push($registros[$rk], $name);
                    $registros[$rk]['tecnica_name']=$registros[$rk][0];
                    unset($registros[$rk][0]);
                }
            }
        }

        #d($revisado);
        return view('analizar', [
            'investigacion' => $investigacion,
            'tecnicas' => $tecnicas,
            'registros' => $registros,
            'revisado' => $revisado,
        ]);

    }


    public function create(Request $request)
    {
        if(request()->tecnica_desc == null)
        {
            $array_tecnica = array(
                "tecnica_name" => request()->tecnica,
                "tecnica_desc" => 'vacio',
            );
        }else{
            $array_tecnica = array(
                "tecnica_name" => request()->tecnica,
                "tecnica_desc" => request()->tecnica_desc,
            );
        }


        Tecnica::insert($array_tecnica);

        return redirect()->back()->with('alert', 'Nueva Tecnica creada correctamente.');
    }


}
