<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BatiInscricao extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'bati_inscricoes';

    protected $fillable = [
        'bati_id', 'nome', 'cpf', 'identidade', 'endereco', 'telefone', 'email', 'matricula', 'departamento',
        'laboratorio', 'regimetrabalho', 'titulacao', 'vinculo', 'area_id', 'projetospesquisa', 'termosoutorga', 'titulocapitulo',
        'curriculolattes', 'user_id', 'areaconhecimento_id', 'centro_id', 'modalidade_id'
    ];

    protected $primaryKey = 'bati_inscricao_id';

    protected $dates = ['deleted_at'];

    //Relacionamento com a tabela planotrabalho
    public function plano_trabalho()
    {
        return $this->belongsTo(PlanoTrabalho::class, 'bati_inscricao_id')->withTrashed();
    }
    //Relacionamento com a tabela batis
    public function bati_inscricao_bati()
    {
        return $this->belongsTo(Bati::class, 'bati_id')->withTrashed();
    }
    //Relacionamento com a tabela SubArea
    public function bati_inscricao_subArea()
    {
        return $this->belongsTo(SubArea::class, 'areaconhecimento_id')->withTrashed();
    }
    //Relacionamento com a tabela GrandeArea
    public function bati_inscricao_grandeArea()
    {
        return $this->belongsTo(GrandeArea::class, 'area_id')->withTrashed();
    }
    //Relacionamento com a tabela Users
    public function bati_inscricao_users()
    {
        return $this->belongsTo(User::class, 'user_id')->withTrashed();
    }
    //Relacionamento com a tabela Centros
    public function bati_inscricao_centros()
    {
        return $this->belongsTo(Centros::class, 'centro_id')->withTrashed();
    }
    //Relacionamento com a tabela Centros
    public function bati_inscricao_modalidade_bolsas()
    {
        return $this->belongsTo(ModalidadeBolsa::class, 'modalidade_id')->withTrashed();
    }
}
