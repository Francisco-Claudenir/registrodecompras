<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PrimeiroPasso extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'primeirospassos';
    
    protected $fillable = ['nome', 'descricao', 'data_inicio', 'data_fim', 'status'];

    protected $primaryKey = 'primeiropasso_id';

    protected $dates = ['deleted_at'];

    // //Relacionamento com a tabela PrimeiroPassoInscricao
    // public function semic_semicInscricao()
    // {
    //     return $this->hasMany(PrimeiroPassoInscricao::class, 'primeiropasso_id')->withTrashed();
    // }
}
