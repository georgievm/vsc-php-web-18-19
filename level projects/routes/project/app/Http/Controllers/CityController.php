<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use App\Http\Requests\CityCreateRequest;
use App\Http\Requests\CityEditRequest;

class CityController extends Controller
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
        $cities = City::all();
        return view('cities.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CityCreateRequest $request)
    {
        City::create([
            'name'=> $request->name
        ]);

        return redirect()->route('cities.index')
            ->withMessage('City <span class="bold">created</span> successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $city = City::find($id);
        return view('cities.show', compact('city'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $city = City::find($id);
        return view('cities.edit', compact('city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CityEditRequest $request, $id)
    {
        $city = City::find($id);
        $city->update([
            'name' => $request->name
        ]);

        return redirect()->route('cities.index')
            ->withMessage('City <span class="bold">edited</span> successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $city = City::find($id);

        $city->delete();
        return redirect()->route('cities.index')
                ->withMessage('City <span class="bold">deleted</span> successfully!');
    }
}
