<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    use HasFactory;

    protected $table = 'cidades';
    protected $fillable = ['estado_id', 'cidades'];

    public function estados()
    {
        return $this->belongsTo(Estado::class, 'estado_id');
    }

    public function centros()
    {
        return $this->hasMany(Centro::class, 'cidade_id');
    }

}
