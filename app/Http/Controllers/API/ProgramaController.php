<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Programa;

class ProgramaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    */

    public function index()
    {
        return Programa::latest()->paginate(5);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Programa::create([
            "nombre_programa" => $request["nombre_programa"],
            "categoria" => $request["categoria"],            
            "subcategoria" => $request["subcategoria"],
            "framework_lenguaje" => $request["framework_lenguaje"],
            "foto_programa" => $request["foto_programa"],
            "enlace" => $request["enlace"],                   
        ]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Programa $programa)
    {   
        $programa = Programa::all();
        return response()->json($programa);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
    */
    public function programa()
    {   
        $programa = Programa::all();
        return response()->json($programa);    
    }

    public function update(Request $request, $id)
    {
        $programa = Programa::findOrFail($id);        

        $programa->update($request->all());
        return ['message' => 'Updated the user info'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $programa = Programa::findOrFail($id);
        // delete the user

        $programa->delete();

        return ['message' => 'Programa Deleted'];
    }
}
