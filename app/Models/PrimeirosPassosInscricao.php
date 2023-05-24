<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PrimeirosPassosInscricao extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'primeiropasso_id',
        'user_id',
        'areaconhecimento_id',
        'identidade',
        'matricula',
        'centro',
        'copiacontrato',
        'tituloprojetopesquisa',
        'resumoprojeto',
        'projetopesquisa',
        'chefeimediato',
        'parecercomite',
        'curriculolattes'
        
    ];

    public function planotrabalho(){
        return $this->belongsToMany(PlanoTrabalho::class, 'pp_inscricao__ptrabalhos');
    }
}