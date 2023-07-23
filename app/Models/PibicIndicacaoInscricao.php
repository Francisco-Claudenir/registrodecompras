<?php

namespace App\Models;

use App\Observers\AuditoriaObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PibicIndicacaoInscricao extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'pibicindicacao_inscricoes';

    protected $fillable = [
        'pibicindicacao_id',
        'user_id',
        'nome_bolsista',
        'endereco',
        'centro',
        'curso',
        'telefone',
        'identidade',
        'doc_identidade',
        'cpf',
        'doc_cpf',
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
        'termocompromissobolsista_fapema',
        'declaracaoempregaticio',
        'declaracaoempregaticio_fapema',
        'curriculo_lattes',
        'declaracao_estagio',
        'doc_comprobatorio',
        'agencia',
        'conta',
        'comprovante',
        'termocompromisso_orientador',

    ];

    protected $primaryKey = 'pibicindicacao_id';

    protected $casts = [
        'endereco' => 'array'
    ];

    public static function boot()
    {
        parent::boot();

        parent::observe(AuditoriaObserver::class);
    }

    protected $dates = ['deleted_at'];

    public function pibicindicacao_inscricao_pibicindicacao()
    {
        return $this->belongsTo(PibicIndicacao::class, 'pibicindicacao_id')->withTrashed();
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
