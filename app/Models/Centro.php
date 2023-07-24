<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Centro extends Model
{
    use HasFactory;

    protected $table = 'centros';
    protected $fillable = ['cidade_id', 'centros', 'latitude', 'longitude'];

    public function cidades()
    {
        return $this->belongsTo(Cidade::class, 'cidade_id');
    }

    public function equipamentos()
    {
        return $this->hasMany(Equipamento::class, 'centro_id');
    }

    public function pp_inscricao()
    {
        return $this->hasMany(PrimeirosPassosInscricao::class, 'centro_id');
    }
    public function pibicIndicacaoInscricao_bolsista()
    {
        return $this->hasMany(PibicIndicacaoInscricao::class, 'centro_bolsista');
    }
    public function pibicIndicacaoInscricao_orientador()
    {
        return $this->hasMany(PibicIndicacaoInscricao::class, 'centro_orientador');
    }
}
