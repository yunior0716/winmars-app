<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class empleados extends Model
{
    use HasFactory;
    protected $table = 'empleados';
    protected $primaryKey = 'codemp';

    protected $fillable = [
        'nomemp',
        'apeemp',
        'telem1',
        'telem2',
        'direccion',
        'correo',
        'cedula',
        'ctipemp',
        'codpos',
        'hora_entrada',
        'hora_salida',
        'estemp',
    ];
}
