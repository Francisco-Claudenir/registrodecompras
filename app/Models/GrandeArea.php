<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrandeArea extends Model
{
    use HasFactory;
    protected $table = 'grande_areas';
    protected $fillable = ['nome'];


    public function subAreas(){
        return $this->hasMany(SubArea::class);
    }
}
