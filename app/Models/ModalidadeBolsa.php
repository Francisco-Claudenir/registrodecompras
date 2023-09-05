<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ModalidadeBolsa extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['nome'];

    protected $primaryKey = 'modalidade_id';

    protected $dates = ['created_at','deleted_at'];


    public function planostrabalhos()
    {
        return $this->hasMany(PlanoTrabalho::class,'modalidade_id')->withTrashed();
    }

    public function bati_inscricao()
    {
        return $this->hasMany(BatiInscricao::class,'modalidade_id')->withTrashed();
    }
}
