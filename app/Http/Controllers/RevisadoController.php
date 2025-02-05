<?php

namespace App\Http\Controllers;

use App\Models\Revisado;
use Illuminate\Http\Request;

class RevisadoController extends Controller
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
        $array_revisado = array(
            "tesis_id" => request()->tesis_id,
            "nivel" => request()->nivel,
        );
        Revisado::insert($array_revisado);

        return redirect()->back()->with('alert', 'Tesis clasificada correctamente.');

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
     * @param  \App\Models\Revisado  $revisado
     * @return \Illuminate\Http\Response
     */
    public function show(Revisado $revisado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Revisado  $revisado
     * @return \Illuminate\Http\Response
     */
    public function edit(Revisado $revisado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Revisado  $revisado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Revisado $revisado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Revisado  $revisado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Revisado $revisado)
    {
        //
    }
}
