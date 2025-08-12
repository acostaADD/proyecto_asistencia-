<?php

namespace App\Http\Controllers;

use App\Models\Empleados;
use Illuminate\Http\Request;

class EmpleadosController extends Controller
{
    public function search(Request $request)
    {
        $query = Empleados::query();

        if ($dni = $request->input('dni')) {
            $query->where('dni', 'like', "%$dni%");
        }
        if ($name = $request->input('name')) {
            $query->where('name', 'like', "%$name%");
        }
        if ($apellido = $request->input('apellido')) {
            $query->where('apellido', 'like', "%$apellido%");
        }
        if ($cargo = $request->input('cargo')) {
            $query->where('cargo', 'like', "%$cargo%");
        }
        if ($fecha_ingreso = $request->input('fecha_ingreso')) {
            $query->whereDate('fecha_ingreso', $fecha_ingreso);
        }
        if ($fecha_salida = $request->input('fecha_salida')) {
            $query->whereDate('fecha_salida', $fecha_salida);
        }
        if (!is_null($en_planilla = $request->input('en_planilla'))) {
            $query->where('en_planilla', (bool)$en_planilla);
        }
        if ($descanso_fijo = $request->input('descanso_fijo')) {
            $query->where('descanso_fijo', 'like', "%$descanso_fijo%");
        }
        if ($fotografia = $request->input('fotografia')) {
            $query->where('fotografia', 'like', "%$fotografia%");
        }
        if ($empresa_id = $request->input('empresa_id')) {
            $query->where('empresa_id', $empresa_id);
        }

        $paginate = $request->input('paginate') ?? 10;
        $results = $query->paginate($paginate);

        return response()->json($results);
    }

    public function store(Request $request)
    {
        $data = $request->all();

     
        if (isset($data['fecha_ingreso'])) {
            $data['fecha_ingreso'] = date('Y-m-d', strtotime($data['fecha_ingreso']));
        }
        if (isset($data['fecha_salida'])) {
            $data['fecha_salida'] = date('Y-m-d', strtotime($data['fecha_salida']));
        }
        if (isset($data['en_planilla'])) {
            $data['en_planilla'] = (bool)$data['en_planilla'];
        }

        $empleados = Empleados::create($data);
        return response()->json($empleados, 201);
    }

    public function update(Request $request, $id)
    {
        $empleados = Empleados::find($id);
        if (!$empleados) {
            return response()->json(['message' => 'Empleado no encontrado'], 404);
        }

        $data = $request->all();
        if (isset($data['fecha_ingreso'])) {
            $data['fecha_ingreso'] = date('Y-m-d', strtotime($data['fecha_ingreso']));
        }
        if (isset($data['fecha_salida'])) {
            $data['fecha_salida'] = date('Y-m-d', strtotime($data['fecha_salida']));
        }
        if (isset($data['en_planilla'])) {
            $data['en_planilla'] = (bool)$data['en_planilla'];
        }

        $empleados->update($data);
        return response()->json($empleados, 200);
    }

    public function destroy($id)
    {
        $empleados = Empleados::find($id);
        if (!$empleados) {
            return response()->json(['message' => 'Empleado no encontrado'], 404);
        }
        $empleados->delete();
        return response()->json(['message' => 'Empleado eliminado'], 200);
    }
}




    

    



