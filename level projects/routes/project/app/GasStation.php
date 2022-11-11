<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GasStation extends Model
{
    protected $fillable = [
    	'name','city_id', 'distance_to_the_city', 'road_id', 'diesel_price', 'gasoline_price', 'gas_price', 'electricity_price', 'metan_price'
    ];

    public function road()
    {
    	return $this->belongsTo('App\Road');
    }
    public function city()
    {
    	return $this->belongsTo('App\City');
    }
}
