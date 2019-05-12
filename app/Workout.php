<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{
    protected $fillable = ['bodypart_id'];

    public function bodypart()
    {
        return $this->belongsTo('App\Bodypart');
    }  
}
    