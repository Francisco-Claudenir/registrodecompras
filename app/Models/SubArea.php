<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubArea extends Model
{
    use HasFactory;
    protected $table = 'sub_areas';
    protected $fillable = ['area_id','nome'];

    protected $primaryKey = 'areaconhecimento_id';

    //Relacionamento com a tabela GrandeArea
    public function subArea_grandeArea()
    {
        return $this->belongsTo(GrandeArea::class, 'area_id')->withTrashed();
    }

}
