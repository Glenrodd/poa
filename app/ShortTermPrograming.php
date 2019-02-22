<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShortTermPrograming extends Model
{
    //
    protected $table='programacion_corto_plazo'; 

    public function medium_term_programing()
    {
        return $this->belongsTo('App\MediumTermPrograming','pmp_id');
    }
}
