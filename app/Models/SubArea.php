<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubArea extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'sub_areas';
    protected $fillable = ['area_id','nome'];

    protected $primaryKey = 'areaconhecimento_id';

    protected $dates = ['deleted_at'];

    //Relacionamento com a tabela GrandeArea
    public function subArea_grandeArea()
    {
        return $this->belongsTo(GrandeArea::class, 'area_id')->withTrashed();
    }

}
