<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Semic extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'semics';
    
    protected $fillable = ['nome', 'descricao', 'data_inicio', 'data_fim'];

    protected $primaryKey = 'semic_id';

    protected $dates = ['deleted_at'];

    //Relacionamento com a tabela SemicInscricao
    public function semic_semicInscricao()
    {
        return $this->hasMany(SemicInscricao::class, 'semic_id')->withTrashed();
    }

}
