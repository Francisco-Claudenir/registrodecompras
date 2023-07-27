<?php

namespace App\Models;

use App\Models\Traits\HasUuid;
use App\Observers\AuditoriaObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PrimeirosPassosInscricao extends Model
{
    use HasFactory, SoftDeletes, HasUuid;

    protected $fillable = [
        'primeiropasso_id',
        'numero_inscricao',
        'status',
        'user_id',
        'areaconhecimento_id',
        'identidade',
        'matricula',
        'centro_id',
        'copiacontrato',
        'vigencia_inicio',
        'vigencia_fim',
        'tituloprojetopesquisa',
        'resumoprojeto',
        'projetopesquisa',
        'chefeimediato',
        'anuenciachefe',
        'parecercomite',
        'curriculolattes'

    ];
    protected $primaryKey = 'passos_inscricao_id';

    protected $dates = ['deleted_at'];

    protected $casts = [
        'endereco' => 'array'
    ];
    public static function boot()
    {
        parent::boot();

        parent::observe(AuditoriaObserver::class);
    }



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

    public function centros()
    {
        return $this->belongsTo(Centro::class,'centro_id','id');
    }

    public function pp_inscricao_user()
    {
        return $this->belongsTo(User::class,'user_id', 'id');
    }

    public function cpf($cpff)
    {
        $cpf = '***.' . substr($cpff, 3, 3) . '.' . substr($cpff, 6, 3) . '-**';
        return $cpf;
    }
}
