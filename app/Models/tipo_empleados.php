<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipo_empleados extends Model
{
    use HasFactory;

    protected $table = 'tipo_empleados';
    protected $primaryKey = 'ctipemp';

    protected $fillable = [
        'descripcion',
    ];
}
