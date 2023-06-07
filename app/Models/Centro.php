<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Centro extends Model
{
    use HasFactory;

    protected $table = 'centros';
    protected $fillable = ['cidade_id', 'centros', 'latitude', 'longitude'];

    public function cidades()
    {
        return $this->belongsTo(cidades::class, 'cidade_id');
    }

    public function equipamentos()
    {
        return $this->hasMany(Equipamento::class, 'centro_id');
    }

}
