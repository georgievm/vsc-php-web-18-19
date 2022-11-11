<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Road;
use App\RoadType;
use App\City;
use App\Http\Requests\RoadCreateRequest;
use App\Http\Requests\RoadEditRequest;

class RoadController extends Controller
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
        $roads = Road::all();
        return view('roads.index', compact('roads'));
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

        $road_types = RoadType::all();
        $road_types_arr = $road_types->pluck('type', 'id');

        return view('roads.create', compact('cities_arr', 'road_types_arr'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoadCreateRequest $request)
    {
        Road::create([
            'city_x_id'=> $request->city_x_id,
            'city_y_id'=> $request->city_y_id,
            'road_type_id'=> $request->road_type_id,
            'speed_limit'=> $request->speed_limit,
            'distance_km'=> $request->distance
        ]);

        return redirect()->route('roads.index')
            ->withMessage('Road <span class="bold">created</span> successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $road = Road::find($id);
        return view('roads.show', compact('road'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $road = Road::find($id);

        $cities = City::all();
        $cities_arr = $cities->pluck('name', 'id');

        $road_types = RoadType::all();
        $road_types_arr = $road_types->pluck('type', 'id');

        return view('roads.edit', compact('road', 'cities_arr', 'road_types_arr'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoadEditRequest $request, $id)
    {
        $road = Road::find($id);
        $road->update([
            'city_x_id'=> $request->city_x_id,
            'city_y_id'=> $request->city_y_id,
            'road_type_id'=> $request->road_type_id,
            'speed_limit'=> $request->speed_limit,
            'distance_km'=> $request->distance
        ]);

        return redirect()->route('roads.index')
            ->withMessage('Road <span class="bold">edited</span> successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $road = Road::find($id);

        $road->delete();
        return redirect()->route('roads.index')
            ->withMessage('Road <span class="bold">deleted</span> successfully!');
    }
}
