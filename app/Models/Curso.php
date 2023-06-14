<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    protected $table = 'cursos';
    protected $fillable = ['centro_id', 'modalidade_id', 'cursos'];

    public function centros()
    {
        return $this->belongsTo(Centro::class, 'centro_id');
    }

    public function modalidades()
    {
        return $this->belongsTo(Modalidade::class, 'modalidade_id');
    }

}
