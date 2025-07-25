<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cuentas extends Model
{
    use HasFactory;

    protected $table = 'cuentas_por_cobrar';
    protected $primaryKey = 'codcue';

    protected $fillable = [
        'codcli',
        'numfac',
        'balance',
        'totpag',
        'balpend',
    ];
}
