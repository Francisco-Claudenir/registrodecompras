<?php

namespace App\Models;

use App\Models\Traits\HasUuid;
use App\Observers\AuditoriaObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Minicurso extends Model
{
    use HasFactory, SoftDeletes, HasUuid;
    protected $table = 'minicursos';

    protected $fillable = [
        'nome',
        'vagas',
        'horas',
        'descricao',
        'data_hora',
        'descricao_ministrante',
        'semicevento_id'
            ];

    protected $primaryKey = 'minicurso_id';

    protected $dates = ['deleted_at','data_hora'];



    public static function boot()
    {
        parent::boot();

        parent::observe(AuditoriaObserver::class);
    }


    public function minicurso_semicevento()
    {
        return $this->belongsTo(SemicEvento::class, 'semicevento_id')->withTrashed();
    }
}
