<?php

namespace App\Models;

use App\Observers\AuditoriaObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Certificado extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'certificados';

    protected $fillable = ['nome', 'descricao', 'img'];

    protected $primaryKey = 'certificado_id';

    protected $dates = ['deleted_at'];

    public static function boot()
    {
        parent::boot();
        parent::observe(AuditoriaObserver::class);

    }
}
