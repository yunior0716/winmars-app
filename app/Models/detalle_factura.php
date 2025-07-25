<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detalle_factura extends Model
{
    use HasFactory;

    protected $table = 'detalle_factura';

    protected $fillable = [
        'numfac',
        'codpro',
        'concepto',
        'cantidad',
        'precio',
    ];
}
