<?php

namespace App\Http\Controllers;

use App\Models\Island;
use Illuminate\Http\Request;
use App\Models\Region;

class IslandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        return view('pages.islands.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'region_id' => 'required|exists:regions,id',
            'population' => 'nullable',
            'area_sq_km' => 'nullable',
            'description' => 'nullable',
            'image' => 'nullable',

        ]);

        Island::create([
            'name' => $request->input('name'),
            'region_id' => $request->input('region_id'),
            'description' => $request->input('description', null),
            'image' => $request->input('image', null),
            'population' => $request->input('population', null),
            'area_sq_km' => $request->input('area_sq_km', null),
        ]);
    }

    /**
     * Display the specified resource.
     */
    // public function show(Island $island)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(Island $island)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, Island $island)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(Island $island)
    // {
    //     //
    // }
}
