<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class facturas extends Model
{
    use HasFactory;

    protected $table = 'factura';
    protected $primaryKey = 'numfac';

    protected $fillable = [
        'codcli',
        'codusu',
        'condicion',
        'subtot',
        'total',
        'form_pag',
        'codcom',
        'fecemis',
        'fecvenc',
        'observaciones',
        'estfac',
    ];
}
