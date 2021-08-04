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
        if(count($revisados)>0)
        {
            foreach($investigaciones as $ik=>$iv) {
                foreach($revisados as $rk=>$rv) {
                    if($iv['tesis_id']==$rv['tesis_id']){
                        array_push($investigaciones[$ik], $rv['nivel']);
                        $investigaciones[$ik]['nivel']=$investigaciones[$ik][0];
                        unset($investigaciones[$ik][0]);
                    }
                    elseif($iv['tesis_id']!==$rv['tesis_id'])
                    {
                        array_push($investigaciones[$ik], 'Sin revisar');
                        $investigaciones[$ik]['nivel']=$investigaciones[$ik][0];
                        unset($investigaciones[$ik][0]);
                    }
                }
            }
        }else{
            foreach($investigaciones as $ik=>$iv) {
                array_push($investigaciones[$ik], 'Sin revisar');
                $investigaciones[$ik]['nivel']=$investigaciones[$ik][0];
                unset($investigaciones[$ik][0]);
            }            
        }


        #dd($investigaciones);
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
        if(count($revisados)>0)
        {
            foreach($investigaciones as $ik=>$iv) {
                foreach($revisados as $rk=>$rv) {
                    if($iv['tesis_id']==$rv['tesis_id']){
                        array_push($investigaciones[$ik], $rv['nivel']);
                        $investigaciones[$ik]['nivel']=$investigaciones[$ik][0];
                        unset($investigaciones[$ik][0]);
                    }
                    elseif($iv['tesis_id']!==$rv['tesis_id'])
                    {
                        array_push($investigaciones[$ik], 'Sin revisar');
                        $investigaciones[$ik]['nivel']=$investigaciones[$ik][0];
                        unset($investigaciones[$ik][0]);
                    }
                }
            }
        }else{
            foreach($investigaciones as $ik=>$iv) {
                array_push($investigaciones[$ik], 'Sin revisar');
                $investigaciones[$ik]['nivel']=$investigaciones[$ik][0];
                unset($investigaciones[$ik][0]);
            }            
        }


        #dd($investigaciones);
        return view('revisados')->with([
            'investigaciones' => $investigaciones,
        ]);
    }




}
