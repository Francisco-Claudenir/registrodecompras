<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auditoria extends Model
{
    use HasFactory;

    protected $table = 'auditorias';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_type', 'user_id', 'event',
        'table_log', 'table_id', 'old_values', 'new_values', 'url',
        'ip_address', 'user_agent'
    ];

    protected static $searchable = [
        'user_type' => 'ilike',
        'user_id' => '=',
        'event' => 'like',
        'table_id' => '=',
        'table_log' => 'ilike',
        'created_at' => 'like'
    ];
}
