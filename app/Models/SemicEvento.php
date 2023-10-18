<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SemicEvento extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'semic_eventos';
    
    protected $fillable = ['nome', 'banner', 'descricao', 'visivel','data_inicio', 'data_fim', 'data_certificado', 'status'];

    protected $primaryKey = 'semic_evento_id';

    protected $dates = ['deleted_at'];

    public function semic_evento_semic_eventoinscricao()
    {
        return $this->hasMany(SemicEventoInscricao::class, 'semic_evento_id')->withTrashed();
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
        return ($quanto_passou / $total_dias) * 100;
    }

}
