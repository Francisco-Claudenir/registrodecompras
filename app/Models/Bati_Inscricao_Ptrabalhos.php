<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bati_Inscricao_Ptrabalhos extends Model
{
    use HasFactory;

    protected $table = 'bati_inscricao_ptrabalhos';
    protected $fillable = ['bati_inscricao_id', 'plano_id'];


    public function plano_trabalhos()
    {
        return $this->hasMany(PlanoTrabalho::class, 'plano_id');
    }

    public function bati_incricoes()
    {
        return $this->hasMany(BatiInscricoes::class, 'bati_inscricao_id');
    }
}
