<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Cuestionario;
use App\Models\CuestionarioAlumno;
use Illuminate\Http\Request;

class CuestionarioController extends Controller
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($cuestionario_id)
    {
        $cuestionario = Cuestionario::find($cuestionario_id);
        return response()->json($cuestionario,200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function saveAnswers(Request $request){
        $data = $request->all();
        $cuestionario_alumno = new CuestionarioAlumno();
        $cuestionario_alumno->cuestionario_id  = $request['cuestionario_id'];
        $cuestionario_alumno->alumno_id = $request['alumno_id'];
        $cuestionario_alumno->aciertos = $request['aciertos'];
        $cuestionario_alumno->save();

        return response()->json('salio bien',200);
    }
}
