<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RoadType;
use App\Http\Requests\RoadTypeCreateRequest;
use App\Http\Requests\RoadTypeEditRequest;

class RoadTypeController extends Controller
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
        $road_types = RoadType::all();
        return view('road_types.index', compact('road_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('road_types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoadTypeCreateRequest $request)
    {
        RoadType::create([
            'type'=> $request->type,
            'delay_factor'=> $request->delay_factor
        ]);

        return redirect()->route('road_types.index')
            ->withMessage('Road type <span class="bold">created</span> successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $road_type = RoadType::find($id);
        return view('road_types.show', compact('road_type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $road_type = RoadType::find($id);
        return view('road_types.edit', compact('road_type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoadTypeEditRequest $request, $id)
    {
        $road_type = RoadType::find($id);
        $road_type->update([
            'type' => $request->type,
            'delay_factor' => $request->delay_factor
        ]);

        return redirect()->route('road_types.index')
            ->withMessage('Road type <span class="bold">edited</span> successfully!');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $road_type = RoadType::find($id);

        $road_type->delete();
        return redirect()->route('road_types.index')
                ->withMessage('Road type <span class="bold">deleted</span> successfully!');
    }
}
