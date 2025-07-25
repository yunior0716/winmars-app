<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class direcciones extends Model
{
    use HasFactory;
    protected $table = 'direcciones';
    protected $primaryKey = 'id';

    protected $fillable = [
        'codpro',
        'ciudad',
        'municipio',
        'direccion',
    ];
}
