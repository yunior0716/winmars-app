<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class posiciones_empleado extends Model
{
    use HasFactory;

    protected $table = 'posiciones_empleados';
    protected $primaryKey = 'codpos';

    protected $fillable = [
        'posicion',
    ];

}
