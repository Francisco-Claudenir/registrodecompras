<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PP_IndicacaoBolsistasInscricao extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'pp_indicacao_bolsistas_inscricao';

    protected $fillable = [
        'pp_i_bolsista_id',
        'user_id',
        'areaconhecimento_id',
        'curso',
        'centro',
        'numero_identidade',
        'documento_identidade',
        'documento_cpf',
        'nome_orientador',
        'telefone_orientador',
        'email_orientador',
        'titulo_projeto_orientador',
        'titulo_plano_orientador',
        'historico_escolar',
        'declaracao_vinculo',
        'termo_compromisso_bolsista',
        'declaracao_negativa_vinculo',
        'curriculo',
        'declaracao_conjuta_estagio',
        'agencia_banco',
        'numero_conta_corrente',
        'comprovante_conta_corrente',
        'termo_compromisso_orientador'
    ];

    protected $primaryKey = 'pp_i_bolsista_inscricao_id';

    protected $dates = ['deleted_at'];

    
    public function pp_i_b_inscricao_pp_i_bolsista()
    {
        return $this->belongsTo(PP_IndicacaoBolsistas::class, 'pp_i_bolsista_id')->withTrashed();
    }

    
    public function pp_i_b_inscricao_user()
    {
        return $this->belongsTo(User::class, 'user_id')->withTrashed();
    }

    
    public function pp_i_b_inscricao_subArea()
    {
        return $this->belongsTo(SubArea::class, 'areaconhecimento_id')->withTrashed();
    }
}