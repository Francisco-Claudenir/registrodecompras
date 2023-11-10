<?php

namespace App\Models;

use App\Models\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SemicEventoInscricao extends Model
{
    use HasFactory, SoftDeletes, HasUuid;

    protected $table = 'semic_eventoinscricao';

    protected $fillable = [
        'semic_evento_id', 'user_id', 'nome_orientador', 'titulo_trabalho', 'arquivo', 'cota_bolsa', 'numero_inscricao','tipo', 'status'
    ];

    protected $primaryKey = 'semic_eventoinscricao_id';

    protected $dates = ['deleted_at'];

    //Relacionamento com a tabela Users
    public function semic_eventoinscricao_users()
    {
        return $this->belongsTo(User::class,'user_id', 'id');
    }

    //Relacionamento com a tabela semic_eventos
    public function semic_eventoinscricao_semic_evento()
    {
        return $this->belongsTo(SemicEvento::class, 'semic_evento_id')->withTrashed();
    }

    public function semiceventoinscricao_minicurso()
    {
        return $this->hasMany(MinicursoSemiceventoinscricao::class,   'semic_eventoinscricao_id');
    }
}
