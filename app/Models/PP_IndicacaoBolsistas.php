<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PP_IndicacaoBolsistas extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'pp_indicacao_bolsistas';

    protected $fillable = ['nome', 'descricao', 'data_inicio','visivel', 'data_fim', 'status'];

    protected $primaryKey = 'pp_i_bolsista_id';

    protected $casts = [
        'visivel' => 'boolean',
    ];


    protected $dates = ['deleted_at'];

    //Relacionamento de PP_IndicacaoBolsistas para PP_IndicacaoBolsistasInscricao
    public function pp_i_bolsista_pp_i_b_inscricao()
    {
        return $this->hasMany(PP_IndicacaoBolsistasInscricao::class, 'pp_i_bolsista_id')->withTrashed();
    }

    public function percentual()
    {
        // Obtém a data atual
        $today = today();

        // Cria um objeto Carbon a partir da data de início fornecida
        $inicio = Carbon::createFromFormat('Y-m-d H:i:s', $this->data_inicio);

        // Verifica se a data atual é menor ou igual à data de início
        if ($today->lessThanOrEqualTo($inicio)) {
            return 0;
        }

        // Calcula quantos dias passaram desde a data de início até a data atual
        $quanto_passou = $today->diffInDays($inicio);

        // Cria um objeto Carbon a partir da data de fim fornecida
        $fim = Carbon::createFromFormat('Y-m-d H:i:s', $this->data_fim);

        // Calcula o total de dias entre a data de início e a data de fim, incluindo ambos
        $total_dias = $fim->diffInDays($inicio) + 1;

        // Verifica se a porcentagem de dias passados em relação ao total de dias é maior que 100.00%
        if (($quanto_passou / $total_dias) * 100 > 100.00) {
            return 100.00;
        }

        // Retorna a porcentagem de dias passados em relação ao total de dias
        return ($quanto_passou / $total_dias) * 100;
    }
}
