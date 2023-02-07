<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Movimiento;
use App\Models\Producto;
use Illuminate\Http\Request;
use App\Http\Requests\CrearMovimientoRequest;
use Illuminate\Support\Facades\DB;

class MovimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Movimiento::all();
    }

    public function joins()
    {
        $resultado = DB::table('movimientos')
        ->leftJoin('productos','productos.id','=','movimientos.producto_id')
        ->leftJoin('tipos','tipos.id','=','movimientos.tipo_id')
        ->select()
        ->get();
        return response()->json([
            'res' => true,
            'lista' => $resultado
        ]);
    }

    public function filterJoins($id)
    {
        $resultado = DB::table('movimientos')
        ->leftJoin('productos','productos.id','=','movimientos.producto_id')
        ->leftJoin('tipos','tipos.id','=','movimientos.tipo_id')
        ->select()
        ->where('productos.id','=',$id)
        ->get();
        return response()->json([
            'res' => true,
            'lista' => $resultado
        ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CrearMovimientoRequest $request)
    {

        $producto = Producto::findOrFail($request->producto_id);

        $cantidad = $request->tipo_id == 1 
        ? $request->cantidad + $producto->cantidad
        : $producto->cantidad - $request->cantidad;

        DB::update(DB::raw('UPDATE productos SET cantidad='.$cantidad.' WHERE id ='.$request->producto_id));

        Movimiento::create($request->all());

        return response()->json([
            'res'=>true,
            'mensaje'=> 'Movimiento creado correcta'
        ]);
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
