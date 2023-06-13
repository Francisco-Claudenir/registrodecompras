<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bati extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'batis';

    protected $fillable = ['nome', 'descricao', 'data_inicio', 'data_fim', 'status'];

    protected $primaryKey = 'bati_id';

    protected $dates = ['deleted_at'];

    //Relacionamento com a tabela BatiInscrição

    public function bati_batiInscricao()
    {
        return $this->hasMany(SemicInscricao::class, 'bati_id')->withTrashed();
    }

    public function percentual()
    {
        $today = today();
        $inicio = Carbon::createFromFormat('Y-m-d H:i:s', $this->data_inicio);
        if ($today->lessThanOrEqualTo($inicio)) {
            return 0;
        }
        $quanto_passou = $today->diffInDays($inicio);
        $fim = Carbon::createFromFormat('Y-m-d H:i:s', $this->data_fim);
        $total_dias = $fim->diffInDays($inicio) + 1;

        if(($quanto_passou / $total_dias) * 100 > 100.00){
            return 100.00;
        }
        
        return ($quanto_passou / $total_dias) * 100;
    }

}
