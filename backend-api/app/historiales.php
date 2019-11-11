<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class historiales extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'NombreDelDoctor', 'NombreDelPaciente', 'CUI', 'fecha', 'TipoFormulario', 'Path'
    ];
    public $timestamps =false;
    protected $primaryKey  = 'Path';
}