<?php

namespace App\Models;

use App\Models\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PP_IndicacaoBolsistasInscricao extends Model
{
    use HasFactory, SoftDeletes, HasUuid;

    protected $table = 'pp_indicacao_bolsistas_inscricao';

    protected $fillable = [
        'pp_i_bolsista_id',
        'user_id',
        'nome_bolsista',
        'email_bolsista',
        'cpf_bolsista',
        'telefone_bolsista',
        'endereco_bolsista',
        'status',
        'numero_inscricao',
        'curso_id',
        'centro_id',
        'numero_identidade',
        'documento_identidade',
        'documento_cpf',
        'nome_orientador',
        'telefone_orientador',
        'email_orientador',
        'cpf_orientador',
        'centro_orientador_id',
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

    protected $casts = [
        'endereco' => 'array',
        'endereco_bolsista' => 'array'
    ];


    public function pp_i_b_inscricao_pp_i_bolsista()
    {
        return $this->belongsTo(PP_IndicacaoBolsistas::class, 'pp_i_bolsista_id')->withTrashed();
    }


    public function pp_i_b_inscricao_user()
    {
        return $this->belongsTo(User::class, 'user_id')->withTrashed();
    }

    public function curso()
    {
        return $this->belongsTo(Curso::class,'curso_id');
    }
    
    public function cpf($cpf)
    {
        $dados = '***.' . substr($cpf, 3, 3) . '.' . substr($cpf, 6, 3) . '-**';
        return $dados;
    }

    public function mask_telefone($telefone)
    {
        $dado = '(' . substr($telefone, 0, 2) . ')' . ' ' . substr($telefone, 2, 5) . '-' . substr($telefone, 7, 5);
        return $dado;
    }

    public function mask_cpf($cpf)
    {
        $dados = substr($cpf, 0, 3) . '.' . substr($cpf, 3, 3) . '.' . substr($cpf, 6, 3) . '-' . substr($cpf, 9, 2);
        return $dados;
    }

    public function mask_cep($cep)
    {
        $dados = substr($cep, 0, 5) . '-' . substr($cep, 5, 3);
        return $dados;
    }
}
