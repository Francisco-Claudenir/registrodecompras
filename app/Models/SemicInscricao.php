<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SemicInscricao extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'semic_inscricaos';
    
    protected $fillable = ['semic_id', 'user_id', 'areaconhecimento_id', 'genero', 'nomeorientador', 'numero_inscricao',
                            'cpf', 'status', 'email', 'matricula', 'titulacao', 'tituloprojetoorient', 'titulocapitulo',
                            'capitulo'];

    protected $primaryKey = 'semic_inscricao_id';

    protected $dates = ['deleted_at'];

    //Relacionamento com a tabela Semics
    public function semicInscricao_semic()
    {
        return $this->belongsTo(Semic::class, 'semic_id')->withTrashed();
    }

    //Relacionamento com a tabela SubArea
    public function semicInscricao_subArea()
    {
        return $this->belongsTo(SubArea::class, 'areaconhecimento_id')->withTrashed();
    }

    //Relacionamento com a tabela Users
    public function semic_inscricao_user()
    {
        return $this->belongsTo(User::class,'user_id', 'id');
    }

}
