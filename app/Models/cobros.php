<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cobros extends Model
{
    use HasFactory;

    protected $table = 'cobros';
    protected $primaryKey = 'codcob';

    public $fillable = [
        'codcue',
        'numfac',
        'form_pag',
        'cuenta_empresa',
        'cuenta_cliente',
        'banco',
        'fecemi',
        'montpag',
        'cobrado',
        'devuelta',
        'comentario'
    ];
}
