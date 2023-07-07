<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PibicIndicacao extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'pibic_indicacoes';

    protected $fillable = ['nome', 'tipo', 'descricao', 'data_inicio', 'data_fim', 'visivel', 'status'];

    protected $primaryKey = 'pibicindicacao_id';

    protected $casts = [
        'visivel' => 'boolean',
    ];

    protected $dates = ['deleted_at'];
}
