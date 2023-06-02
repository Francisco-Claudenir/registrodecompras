<?php

namespace App\Models;

use App\Models\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PrimeirosPassosInscricao extends Model
{
    use HasFactory, SoftDeletes, HasUuid;

    protected $fillable = [
        'primeiropasso_id',
        'numero_inscricao',
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
    protected $primaryKey = 'passos_inscricao_id';

    protected $dates = ['deleted_at'];

    protected $casts = [
        'endereco' => 'array'
    ];

    //Relacionamento de PrimeirosPassosInscricao para Plano Trabalho
    // public function planotrabalho(){
    //     return $this->belongsToMany(PlanoTrabalho::class, 'pp_inscricao__ptrabalhos','passosinscricao_id','planotrabalho_id')->withTrashed();
    // }

    public function planotrabalho()
    {
        return $this->belongsToMany(PlanoTrabalho::class, 'pp_inscricao__ptrabalhos', 'passos_inscricao_id', 'plano_id')->withTrashed();
    }

    //Relacionamento de PrimeirosPassosInscricao para SubArea
    public function pp_inscricao_subArea()
    {
        return $this->belongsTo(SubArea::class, 'areaconhecimento_id')->withTrashed();
    }

    //Relacionamento de PrimeirosPassosInscricao para SubArea
    public function ppInscricao_primeirospassos()
    {
        return $this->belongsTo(PrimeiroPasso::class, 'primeiropasso_id')->withTrashed();
    }
    public function pp_inscricao_user()
    {
        return $this->belongsTo(User::class, 'user_id')->withTrashed();
    }
}
