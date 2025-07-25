<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cotizaciones extends Model
{
    use HasFactory;

    protected $table = 'cotizacion';
    protected $primaryKey = 'numcot';

    protected $fillable = [
        'codcli',
        'codusu',
        'condicion',
        'subtot',
        'total',
        'codcom',
        'fecemis',
        'fecvenc',
        'observaciones',
        'estcot',
    ];
}
