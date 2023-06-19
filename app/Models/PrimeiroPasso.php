<?php

namespace App\Models;

use App\Observers\AuditoriaObserver;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PrimeiroPasso extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'primeirospassos';
    
    protected $fillable = ['nome', 'descricao', 'data_inicio', 'data_fim','visivel', 'status'];

    protected $primaryKey = 'primeiropasso_id';

    protected $casts = [
        'visivel' => 'boolean',
    ];

    protected $dates = ['deleted_at'];

    public static function boot()
    {
        parent::boot();
        parent::observe(AuditoriaObserver::class);

    }

    //Relacionamento com a tabela PrimeiroPassoInscricao
    public function primeirospassos_ppInscricao()
    {
        return $this->hasMany(PrimeirosPassosInscricao::class, 'primeiropasso_id')->withTrashed();
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
