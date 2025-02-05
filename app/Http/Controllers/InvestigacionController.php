<?php

namespace App\Http\Controllers;

use App\Models\investigacion;
use Illuminate\Http\Request;

class InvestigacionController extends Controller
{

    public function create(Request $request)
    {
        #Para almacenar el PDF
        if($request->HasFile('doc')){
            $file = $request->file('doc');
            $name = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/investigaciones/',$name);
        } else {
            $name = 'vacio';
        }
        

        #Este bucle sirve para que cuando la variable se mande vacia no se muestre
        if ($request->variable === null)
        {
            $variable = $request->variable;
        }
        else 
        {
            $variable = array_values($request->variable);#Esto sirve para reiniciar el key del array en caso de borrar una entrada en las variables y no se cuelgue el código.
        }
        

        $array_investigacion = array(
            "titulo" => request()->titulo,
            "agno" => request()->agno,
            "criterios" => request()->criterios,
            "universidad" => request()->universidad,
            "archivo" => $name,
            "metodologia" => request()->metodologia,
            "poblacion" => request()->poblacion,
            "variables" => json_encode($variable),
        );

        investigacion::insert($array_investigacion);

        return redirect()->back()->with('alert', 'Nueva investigación creada correctamente.');
    }


    public function show(investigacion $investigacion)
    {
        $investigaciones = \DB::table('investigacions')->orderBy('tesis_id', 'DESC')->get();

        return view('investigacion')->with([
            'investigaciones' => $investigaciones,
        ]);
    }

    public function clasificar(investigacion $investigacion)
    {
        $investigaciones = \DB::table('investigacions')->where('criterios',  'Si cumple')->get();
        $investigaciones = json_decode($investigaciones, true);

        $revisados = \DB::table('revisados')->get();
        $revisados = json_decode($revisados, true);
        
        #Esto para agregar al array de registros el nombre de la tecnica en función del ID
        foreach($investigaciones as $ik=>$iv)
        {
            $investigaciones[$ik]['nivel']='Sin revisar';
        }
        if(count($revisados)>0)
        {  
            foreach($revisados as $rk=>$rv) 
            { 
                $s=array_search($rv['tesis_id'], array_column($investigaciones, 'tesis_id'));
                if($s!==false)
                {
                    $investigaciones[$s]['nivel']='Revisada';
                }
            }    
        }
        return view('clasificar')->with([
            'investigaciones' => $investigaciones,
        ]);
    }


    public function revisados(investigacion $investigacion)
    {
        $investigaciones = \DB::table('investigacions')->where('criterios',  'Si cumple')->get();
        $investigaciones = json_decode($investigaciones, true);

        $revisados = \DB::table('revisados')->get();
        $revisados = json_decode($revisados, true);

        #Esto para agregar al array de registros el nombre de la tecnica en función del ID
        foreach($investigaciones as $ik=>$iv)
        {
            $investigaciones[$ik]['nivel']='Sin revisar';
        }
        if(count($revisados)>0)
        {  
            foreach($revisados as $rk=>$rv) 
            { 
                $s=array_search($rv['tesis_id'], array_column($investigaciones, 'tesis_id'));
                if($s!==false)
                {
                    $investigaciones[$s]['nivel']='Revisada';
                }
            }    
        }
        return view('revisados')->with([
            'investigaciones' => $investigaciones,
        ]);
    }




}
