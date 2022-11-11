<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use App\Road;
use App\GasStation;
use App\RoadType;
use DB;

class MapController extends Controller
{
  public function __construct() {
		$this->middleware('auth');
	}

    public function index() {
    	$cities = City::all();
        $cities_arr = $cities->pluck('name', 'id');
        
    	return view('map.index', compact('cities_arr'));
    }

    public function calcTime(Request $request)
    {
    	$city_x = $request['city_x'];
        $city_y = $request['city_y'];
        $roads = Road::all();
        $cities = City::all();
        $gas_stations = GasStation::all();
        $road_types = RoadType::all();

        //counting the roads and cities
        $count_roads = count($roads);
        $count_cities = count($cities);
        $count_gas_stations = count($gas_stations);

        //set the distance array
        $timeArr = array();
        $roadsArr = array();
        $ee = 1;
        for ($i=1; $i <= ($count_roads*2); $i++) { 
            
            if ($i <= $count_roads) {
               $timeArr[$roads[$i-1]->city_x_id][$roads[$i-1]->city_y_id]=((($roads[$i-1]->distance_km)/($roads[$i-1]->speed_limit))*60);
               $roadsArr[$roads[$i-1]->city_x_id][$roads[$i-1]->city_y_id]=$roads[$i-1]->id;
            }else{
                $timeArr[$roads[$ee-1]->city_y_id][$roads[$ee-1]->city_x_id]=(((($roads[$ee-1]->distance_km)/($roads[$ee-1]->speed_limit))*60));
                $roadsArr[$roads[$ee-1]->city_y_id][$roads[$ee-1]->city_x_id]=$roads[$ee-1]->id;
                $ee++;
            }
        }

        //the start and the end
        $a = $city_x;
        $b = $city_y;

        //initialize the array for storing
        $S = array();//the nearest paths with its parent and weight
        $Q = array();//the left nodes without the nearest paths
        foreach(array_keys($timeArr) as $val)
            $Q[$val] = 99999;
            $Q[$a] = 0;

        //start calculating
        while(!empty($Q)){
            $min = array_search(min($Q), $Q);//the most min weight
            if($min == $b) break;
            foreach($timeArr[$min] as $key=>$val) if(!empty($Q[$key]) && $Q[$min] + $val < $Q[$key]) {
                $Q[$key] = $Q[$min] + $val;
                $S[$key] = array($min, $Q[$key]);
            }
            unset($Q[$min]);
        }
        
        //list the paths
        $paths = array();
        $pos = $b;
        while($pos != $a){
            $paths[] = $pos;
            $pos = $S[$pos][0];

        }
        
        $paths[] = $a;
        $paths = array_reverse($paths);

        //length in min
        $length = floor($S[$b][1]);

        // This is the path Array fill with the roads
        $find_roads = [];
        
        for ($i=0; $i < (count($paths)-1); $i++) { 
            
            for ($j=0; $j < $count_roads; $j++) { 
                if ($paths[$i] == ($roads[$j]->city_y_id) && $paths[$i+1] == ($roads[$j]->city_x_id)) {
                    $find_roads[$i] = $roads[$j]->id;    
                }
                if ($paths[$i] == ($roads[$j]->city_x_id) && $paths[$i+1] == ($roads[$j]->city_y_id)) {
                    $find_roads[$i] = $roads[$j]->id;   
                }
            }
        }

        // calculate the the delay factor for the rout
        $delay = [];
        $tt = 0;
        for ($i=0; $i < $count_roads; $i++) { 
          for ($j=0; $j < count($find_roads); $j++) { 
            for ($k=0; $k < count($road_types); $k++) { 
              if ($roads[$i]->id == $find_roads[$j] && $roads[$i]->road_type_id == $road_types[$k]->id) {
              $delay [$tt]= (($roads[$i]->distance_km / $roads[$i]->speed_limit)*60)*$road_types[$k]->delay_factor;
              $tt++;
              }
            }
          }
        }
        $delay_sum = array_sum($delay);

        // Finding the gas stations in $paths and $find_roads
        $start = 0;
        $find_gas_stations = [];
        $find_roads [count($find_roads)]= 0;

        for ($i=0; $i < count($paths); $i++) { 
            for ($j=0; $j < $count_gas_stations; $j++) { 
                if ($paths[$i] == $gas_stations[$j]->city_id && ($gas_stations[$j]->road_id == NULL) ) {
                   $find_gas_stations[$start][0] = $gas_stations[$j]->id;
                   $find_gas_stations[$start][1] = $gas_stations[$j]->diesel_price;
                   $find_gas_stations[$start][2] = $gas_stations[$j]->gasoline_price;
                   $find_gas_stations[$start][3] = $gas_stations[$j]->gas_price;
                   $find_gas_stations[$start][4] = $gas_stations[$j]->electricity_price;
                   $find_gas_stations[$start][5] = $gas_stations[$j]->metan_price;
                   $find_gas_stations[$start][6] = $gas_stations[$j]->city_id;
                   $find_gas_stations[$start][7] = $gas_stations[$j]->road_id;
                   $find_gas_stations[$start][8] = $gas_stations[$j]->distance_to_the_city;
                   $start++;
                }
                if ($find_roads[$i] == $gas_stations[$j]->road_id && ($gas_stations[$j]->road_id != NULL)) {
                    $find_gas_stations[$start][0] = $gas_stations[$j]->id;
                    $find_gas_stations[$start][1] = $gas_stations[$j]->diesel_price;
                    $find_gas_stations[$start][2] = $gas_stations[$j]->gasoline_price;
                    $find_gas_stations[$start][3] = $gas_stations[$j]->gas_price;
                    $find_gas_stations[$start][4] = $gas_stations[$j]->electricity_price;
                    $find_gas_stations[$start][5] = $gas_stations[$j]->metan_price;
                    $find_gas_stations[$start][6] = $gas_stations[$j]->city_id;
                    $find_gas_stations[$start][7] = $gas_stations[$j]->road_id;
                    $find_gas_stations[$start][8] = $gas_stations[$j]->distance_to_the_city;
                    $start++;
                }
            }
        }
        $time = $S[$b][1];

        for ($i = 0; $i < count($paths); $i++) {
            $paths[$i] = intval($paths[$i]);
        }

        $dif_delay = $delay_sum-$time;
        // dd($find_gas_stations);
    	return view('map.result', compact('city_y','city_x', 'paths', 'length', 'cities', 'find_roads', 'roads', 'find_gas_stations', 'gas_stations', 'time', 'dif_delay'));
    }
}
