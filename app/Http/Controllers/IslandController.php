<?php

namespace App\Http\Controllers;

use App\Models\Island;
use App\Http\Requests\ValidateIslandCreateRequest; // Correct import for ValidateIslandCreateRequest
use Illuminate\Support\Facades\Storage; // Import Storage facade


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
    public function store(ValidateIslandCreateRequest $request)
    {
        $data = $request->validated();

        $island = Island::create($data);
        $extension = $data['image']->getClientOriginalExtension();
        $imageName = $island->id . '.' . $extension;

        Storage::putFileAs('public/images', $data['image'], $imageName);
        $island->image = $imageName;
        $island->save();

        return redirect()->route('islands.index');
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
