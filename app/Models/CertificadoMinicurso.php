<?php

namespace App\Models;

use App\Models\Traits\HasUuid;
use App\Observers\AuditoriaObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CertificadoMinicurso extends Model
{
    use HasFactory, SoftDeletes, HasUuid;

    protected $table = 'certificado_minicursos';

    protected $fillable = ['certificado_id', 'minicursosemiceventoinscricao_id', 'status'];

    protected $primaryKey = 'certificadominicursos_id';

    protected $dates = ['deleted_at'];

    public static function boot()
    {
        parent::boot();
        parent::observe(AuditoriaObserver::class);

    }
}
