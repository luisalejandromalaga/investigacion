<?php

namespace App\Http\Controllers;

use App\Models\tabla_error;
use Illuminate\Http\Request;

class TablaErrorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $error = $request->get('error');

        $array = array(
            "error" => $error,
        );

        tabla_error::insert($array);
        

        echo json_encode('bien');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tabla_error  $tabla_error
     * @return \Illuminate\Http\Response
     */
    public function show(tabla_error $tabla_error)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tabla_error  $tabla_error
     * @return \Illuminate\Http\Response
     */
    public function edit(tabla_error $tabla_error)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tabla_error  $tabla_error
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tabla_error $tabla_error)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tabla_error  $tabla_error
     * @return \Illuminate\Http\Response
     */
    public function destroy(tabla_error $tabla_error)
    {
        //
    }
}
