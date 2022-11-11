<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GasStation;
use App\Http\Requests\GasStationCreateRequest;
use App\Http\Requests\GasStationEditRequest;
use App\City;
use App\Road;
use Illuminate\Support\Arr;

class GasStationController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'check_role']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gas_stations = GasStation::all();
        return view('gas_stations.index', compact('gas_stations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();
        $cities_arr = $cities->pluck('name', 'id');

        $road = Road::all();
        $roads_arr = $road->pluck('id', 'id');

        return view('gas_stations.create', compact('cities_arr', 'roads_arr'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GasStationCreateRequest $request)
    {
        GasStation::create([
            'name'=> $request->name,
            'city_id'=> $request->city_id,
            'distance_to_the_city'=> $request->distance_to_city,
            'road_id'=> $request->road_id,
            'diesel_price'=> $request->diesel,
            'gasoline_price'=> $request->gasoline,
            'gas_price'=> $request->gas,
            'electricity_price'=> $request->electricity,
            'metan_price'=> $request->methane,
        ]);

        return redirect()->route('gas_stations.index')
            ->withMessage('Gas station <span class="bold">created</span> successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $gas_station = GasStation::find($id);
        $city = City::find(GasStation::find($id)->city_id)->name;
        return view('gas_stations.show', compact('gas_station', 'city'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gas_station = GasStation::find($id);
        
        $cities = City::all();
        $cities_arr = $cities->pluck('name', 'id');

        $roads = Road::all();
        $roads_arr = $roads->pluck('id', 'id');

        return view('gas_stations.edit', compact('gas_station', 'cities_arr', 'roads_arr'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GasStationEditRequest $request, $id)
    {
        $gas_station = GasStation::find($id);

        $gas_station->update([
            'name'=> $request->name,
            'road_id'=> $request->road_id,
            'city_id'=> $request->city_id,
            'distance_to_the_city'=> $request->distance_to_city,
            'diesel_price'=> $request->diesel,
            'gasoline_price'=> $request->gasoline,
            'gas_price'=> $request->gas,
            'electricity_price'=> $request->electricity,
            'metan_price'=> $request->methane,
        ]);

        return redirect()->route('gas_stations.index')
            ->withMessage('Gas station <span class="bold">updated</span> successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gas_station = GasStation::find($id);
        $gas_station->delete();

        return redirect()->route('gas_stations.index')
                ->withMessage('Gas station <span class="bold">deleted</span> successfully!');
    }
}
