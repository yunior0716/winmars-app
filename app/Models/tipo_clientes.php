<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipo_clientes extends Model
{
    use HasFactory;

    protected $table = 'tipo_clientes';
    protected $primaryKey = 'codtpcli';

    protected $fillable = [
        'tipcli',
    ];
}
