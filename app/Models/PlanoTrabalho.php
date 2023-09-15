<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PlanoTrabalho extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['modalidade_id', 'titulo', 'resumo', 'arquivo'];

    protected $primaryKey = 'plano_id';

    protected $dates = ['created_at', 'deleted_at'];

    public function ppinscricao()
    {
        return $this->belongsToMany(PrimeirosPassosInscricao::class, 'pp_inscricao_ptrabalhos', 'plano_id', 'passos_inscricao_id');
    }

    public function bati_inscricao()
    {
        return $this->belongsToMany(BatiInscricao::class, 'bati_inscricao__ptrabalhos', 'plano_id', 'bati_inscricao_id');
    }

    public function modalidade()
    {
        return $this->belongsTo(ModalidadeBolsa::class, 'modalidade_id')->withTrashed();
    }

    public function pp_inscricao_ptrabalhos()
    {
        return $this->belongsTo(PpInscricao_Ptrabalho::class, 'plano_id');
    }
    public function bati_inscricao_ptrabalhos()
    {
        return $this->belongsTo(BatiInscricao_Ptrabalho::class, 'plano_id');
    }
}
