<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Empleados extends Model
{
    use HasFactory;
    
    protected $table = 'empleados';

    protected $fillable = [
        'dni',
        'name',
        'apellido',
        'cargo',
        'fecha_ingreso',
        'fecha_salida',
        'en_planilla',
        'descanso_fijo',
        'fotografia',
        'empresa_id',
    ];

public function empleados()
{
    return $this->belongsTo(Empresas::class, 'empresa_id');

}
}
