<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\GuardarProductoRequest;
use App\Http\Requests\ActualizarProductoRequest;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Producto::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GuardarProductoRequest $guardarrequest)
    {
        Producto::create($guardarrequest->all());
        return response()->json([
            'res' => true,
            'msg' => 'Producto Guardado Correctamente'
        ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        return response()->json([
            'res'=>true,
            'producto'=>$producto
        ],200);
    }

    /**
     * 
     */
    public function findNombre($nombre)
    {
        $producto = Producto::where('nombre','=',$nombre)->firstOrFail();
        return response()->json([
            'res'=>true,
            'producto'=> $producto
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ActualizarProductoRequest $request,Producto $producto)
    {   
        $producto -> update($request->all());

        return response()->json([
            "res" => true,
            "mensaje" => "Producto actualizado correctamente"
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();
        return response()->json([
            "res" => true,
            "mensaje" => "Producto Eliminado Correctamente"
        ],200);
    }
}
