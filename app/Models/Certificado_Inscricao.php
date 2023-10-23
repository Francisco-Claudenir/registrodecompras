<?php

namespace App\Models;

use App\Observers\AuditoriaObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Certificado_Inscricao extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'certificado_inscricoes';

    protected $fillable = ['certificado_id', 'semiceventoinscricao_id', 'status'];

    protected $primaryKey = 'certificadoinscricao_id';

    protected $dates = ['deleted_at'];

    public static function boot()
    {
        parent::boot();
        parent::observe(AuditoriaObserver::class);

    }

}
