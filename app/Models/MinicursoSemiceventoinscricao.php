<?php

namespace App\Models;

use App\Models\Traits\HasUuid;
use App\Observers\AuditoriaObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MinicursoSemiceventoinscricao extends Model
{
    use HasFactory, SoftDeletes, HasUuid;
    protected $table = 'minicurso_semiceventoinscricao';

    protected $fillable = [
        'minicurso_id',
        'semic_eventoinscricao_id',
        'status',
    ];

    protected $primaryKey = 'minicursosemiceventoinscricao_id';

    protected $dates = ['deleted_at'];



    public static function boot()
    {
        parent::boot();

        parent::observe(AuditoriaObserver::class);
    }

    public function minicurso_eventoinscricao()
    {
        return $this->belongsTo(Minicurso::class, 'minicurso_id')->withTrashed();
    }

    public function minicurso_semiceventoinscricao()
    {
        return $this->belongsTo(SemicEventoInscricao::class, 'semic_eventoinscricao_id')->withTrashed();
    }
}
