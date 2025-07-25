<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usuarios extends Model 
{
    use HasFactory;

    protected $table = 'usuarios';
    protected $primaryKey = 'codusu';

    protected $fillable = [
        'codemp',
        'nomusu',
        'contus',
        'correo',
        'roles',
        'estusu',
    ];

    protected $hidden = [
        'contus',
    ];

    public function setContusAttribute($value){
        $this->attributes['contus'] = bcrypt($value);
    }

} 
