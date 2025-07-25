<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class solicitudes extends Model
{
    use HasFactory;

    protected $table = 'solicitudes';
    protected $primaryKey = 'codsol';

    protected $fillable = [
        'codcli',
        'codpro',
        'comentario',
        'estsol',
    ];
}
