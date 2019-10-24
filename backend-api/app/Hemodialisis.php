<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hemodialisis extends Model
{
    protected $fillable = [ 
        'idPaciente',
        'FechaHemodialisis',
        'NoHemodialisis',
        'LugarDeProcedencia',
        'TipoDeHemodialisis',
        'Via',
        'LineasPediatrica',
        'Filtro',
        'FlujoDializante',
        'FlujoDeSangre',
        'UF',
        //'Heparinizacion_cebado',
        //'Heparinizacion_TransDialisis',
        'Heparinizacion',
        'TiempoH',
        'TiempoM',
        'Conductividad_Na',
        'Conductividad_K',
        'Conductividad_HCO3',
        'PesoPre',
        'PesoPost',
        'Talla',
        'PesoDelta',
        'Especiales',
        'Observacion',
    ];
    public $timestamps = false;
    /*protected $casts =[
        'Via' => 'array',
        'T2Fecha' => 'array',
        'T2Pre' => 'array',
        'T2Post' => 'array',
        'T2Urr' => 'array'
    ];*/

    /**
     * Relaciones de la tabla de hemodialisis
     */
}
