<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table = 'empleados';

    protected $primaryKey = 'id';

    protected $fillable = [
        'nombres',
        'apellidos',
        'documento',
        'correo',
        'telefono',
        'cargo',
        'area',
        'fecha_ingreso',
        'estado'
    ];

    public $timestamps = true;
}
