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
        return $this->belongsToMany(PrimeirosPassosInscricao::class, 'pp_inscricao__ptrabalhos')->withTrashed();
    }

    public function modalidade()
    {
        return $this->belongsTo(ModalidadeBolsa::class, 'modalidade_id')->withTrashed();
    }
}
