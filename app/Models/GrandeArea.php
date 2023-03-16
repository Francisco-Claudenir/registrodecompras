<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GrandeArea extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'grande_areas';

    protected $fillable = ['nome'];

    protected $primaryKey = 'area_id';

    protected $dates = ['deleted_at'];

    //Relacionamento com a tabela SubArea
    public function grandeArea_subArea(){
        return $this->hasMany(SubArea::class, 'area_id')->withTrashed();
    }

    //Relacionamento com a tabela SemicInscricao
    public function grandeArea_semicInscricao(){
        return $this->hasMany(SemicInscricao::class, 'area_id')->withTrashed();
    }
}
