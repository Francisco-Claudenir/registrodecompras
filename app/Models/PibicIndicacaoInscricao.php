<?php

namespace App\Models;

use App\Observers\AuditoriaObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PibicIndicacaoInscricao extends Model
{
    use HasFactory;
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
}
