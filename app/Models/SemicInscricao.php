<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SemicInscricao extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'semic_inscricaos';
    
    protected $fillable = ['semic_id', 'area_id', 'genero', 'nomeorientador',
                            'cpf', 'email', 'matricula', 'titulacao', 'tituloprojetoorient', 'titulocapitulo',
                            'capitulo'];

    protected $primaryKey = 'semic_inscricao_id';

    protected $dates = ['deleted_at'];

    //Relacionamento com a tabela Semic
    public function semicInscricao_semic()
    {
        return $this->belongsTo(Semic::class, 'semic_id')->withTrashed();
    }

    //Relacionamento com a tabela GrandeArea
    public function semicInscricao_grandeArea()
    {
        return $this->belongsTo(GrandeArea::class, 'area_id')->withTrashed();
    }

}
