<?php

namespace App\Http\Controllers;

use App\Models\Marcacion;
use Illuminate\Http\Request;

class MarcacionController extends Controller
{
    public function search(Request $request)
    {
        $query = Marcacion::query();

        if ($tipo_marcacion = $request->input('tipo_marcacion')) {
            $query->where('tipo_marcacion', 'like', "%{$tipo_marcacion}%");
        }
       
        if ($fecha_hora_ingreso = $request->input('fecha_hora_ingreso')) {
            $query->whereDate('fecha_hora_ingreso', $fecha_hora_ingreso);
        }
        if ($fecha_hora_salida = $request->input('fecha_hora_salida')) {
            $query->whereDate('fecha_hora_salida', $fecha_hora_salida);
        }

         if ($empleado_id = $request->input('empleado_id')) {
            $query->where('empleado_id', $empleado_id);
        }

        $paginate = $request->input('paginate') ?? 10;
        $results = $query->paginate($paginate);

        return response()->json($results);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        
        if (isset($data['fecha_hora_ingreso'])) {
            $data['fecha_hora_ingreso'] = date('Y-m-d H:i:s', strtotime($data['fecha_hora_ingreso']));
        }
        if (isset($data['fecha_hora_salida'])) {
            $data['fecha_hora_salida'] = date('Y-m-d H:i:s', strtotime($data['fecha_hora_salida']));
        }

        $marcacion = Marcacion::create($data);
        return response()->json($marcacion, 201);
    }

    public function update(Request $request, $id)
    {
        $marcacion = Marcacion::find($id);
        if (!$marcacion) {
            return response()->json(['message' => 'Marcación no encontrada'], 404);
        }

        $data = $request->all();

        if (isset($data['fecha_hora_ingreso'])) {
            $data['fecha_hora_ingreso'] = date('Y-m-d H:i:s', strtotime($data['fecha_hora_ingreso']));
        }
        if (isset($data['fecha_hora_salida'])) {
            $data['fecha_hora_salida'] = date('Y-m-d H:i:s', strtotime($data['fecha_hora_salida']));
        }

        $marcacion->update($data);
        return response()->json($marcacion, 200);
    }

    public function destroy($id)
    {
        $marcacion = Marcacion::find($id);
        if (!$marcacion) {
            return response()->json(['message' => 'Marcación no encontrada'], 404);
        }

        $marcacion->delete();
        return response()->json(['message' => 'Marcación eliminada'], 200);
    }
}


