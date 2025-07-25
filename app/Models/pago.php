<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pago extends Model
{
    use HasFactory;

    protected $table = 'pago';
    protected $primaryKey = 'codpag';

    protected $fillable = [
        'codcue',
        'form_pag',
        'cuenta_empresa',
        'cuenta_cliente',
        'banco',
        'fecemi',
        'montpag',
        'cobrado',
        'devuelta',
        'comentario',
    ];
}
