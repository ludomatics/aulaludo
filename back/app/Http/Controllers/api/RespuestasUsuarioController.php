<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\RespuestasAlumno;
use Illuminate\Http\Request;

class RespuestasUsuarioController extends Controller
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
        $data =  $request->all();
        $cuestionario_id = $data['cuestionario_id'];
        $alumno_id = $data['alumno_id'];
        $respuestasAlumno = $data['respuestasAlumno'];

        foreach ($respuestasAlumno as $respuesta){
            RespuestasAlumno::updateOrCreate([
                'cuestionario_id' => $cuestionario_id,
                'alumno_id' => $alumno_id,
                'pregunta_id' => (int)$respuesta['pregunta_id'],
                ],
            [
                'opcion_id'=> $respuesta['opcion_id']
            ]);
        }

        return response()->json('todo salio bien',200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
}
