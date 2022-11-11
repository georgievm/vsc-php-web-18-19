<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoadType extends Model
{
    protected $fillable = [
    	'type', 'delay_factor'
    ];
    public function road()
    {
    	return $this->hasMany('App\Road');
    }
}
