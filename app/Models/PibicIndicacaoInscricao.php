<?php

namespace App\Models;

use App\Models\Traits\HasUuid;
use App\Observers\AuditoriaObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PibicIndicacaoInscricao extends Model
{
    use HasFactory, SoftDeletes, HasUuid;
    protected $table = 'pibicindicacao_inscricoes';

    protected $fillable = [
        'pibicindicacao_id',
        'numero_inscricao',
        'status',
        'user_id',
        'nome_bolsista',
        'email_bolsista',
        'endereco_bolsista',
        'centro_bolsista',
        'curso_bolsista',
        'telefone_bolsista',
        'numero_identidade',
        'documento_identidade',
        'cpf_bolsista',
        'documento_cpf',
        'nome_orientador',
        'cpf_orientador',
        'centro_orientador',
        'telefone_orientador',
        'email_orientador',
        'tituloprojeto_orientador',
        'tituloplano_bolsista',
        'palavras_chave',
        'curriculolattes_orientador',
        'historico_escolar',
        'declaracao_vinculo',
        'termocompromisso_bolsista',
        'declaracaonegativa_vinculo',
        'curriculo_lattes',
        'declaracao_conjuta_estagio',
        'doc_comprobatorio',
        'agencia_banco',
        'numero_conta_corrente',
        'comprovante_conta_corrente',
        'termocompromisso_orientador',

    ];

    protected $primaryKey = 'pi_inscricao_id';

    protected $dates = ['deleted_at'];

    protected $casts = [
        'endereco' => 'array'
    ];


    public static function boot()
    {
        parent::boot();

        parent::observe(AuditoriaObserver::class);
    }
    public function pibicInscricao_pibic()
    {
        return $this->belongsTo(PibicIndicacao::class, 'pibicindicacao_id')->withTrashed();
    }
    public function centroBolsista()
    {
        return $this->belongsTo(Centro::class,'centro_bolsista','id');
    }
    public function cursoBolsista()
    {
        return $this->belongsTo(Curso::class,'curso_bolsista','id');
    }
    public function centroOrientador()
    {
        return $this->belongsTo(Centro::class,'centro_orientador','id');
    }
    public function pibicInscricao_user()
    {
        return $this->belongsTo(User::class,'user_id', 'id');
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
