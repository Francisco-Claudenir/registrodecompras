<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    use HasFactory;

    protected $table = 'perfis';

    protected $fillable = ['nome'];

    protected $primaryKey = 'id';

    protected $dates = ['deleted_at'];


    public function user()
    {
        return $this->hasMany(User::class);
    }
}
