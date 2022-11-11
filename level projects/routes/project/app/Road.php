<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Road extends Model
{
    protected $fillable = [
    	'city_x_id', 'city_y_id', 'road_type_id', 'speed_limit', 'distance_km'
    ];

    public function city()
    {
    	return $this->belongsTo('App\City');
    }

    public function gasStations()
    {
    	return $this->hasMany('App\GasStation');
    }
    public function roadType()
    {
        return $this->hasOne('App\RoadType');
    }
}
