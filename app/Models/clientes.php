<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class clientes extends Model
{
    use HasFactory;

    protected $table = 'clientes';
    protected $primaryKey = 'codcli';

    protected $fillable = [
        'nomcli',
        'apecli',
        'tecli1',
        'tecli2',
        'dircli',
        'corcli',
        'cedrnc',
        'codtpcli',
        'estcli',
    ];
}
