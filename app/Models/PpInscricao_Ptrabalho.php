<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PpInscricao_Ptrabalho extends Model
{
    use HasFactory;

    protected $table = 'pp_inscricao__ptrabalhos';
    protected $fillable = ['passos_inscricao_id','plano_id'];

       
       public function plano_trabalhos()
       {
           return $this->hasMany(PlanoTrabalho::class, 'plano_id');
       }
}
