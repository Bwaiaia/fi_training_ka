<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Island;
use Illuminate\Http\Request;
use App\Models\Village;

class VillageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $villages = Village::all();
        //dd($employees);

        // Pass data to view
        
        return view('villages.index', ['villages' => $villages]);

        //return 'welcome'; //view('employees.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $islands = Island::all()->toArray();
        // dd($islands);
        return view('villages.create')->withIslands($islands);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $input = $request->all();
        
            $results = village::create(['uuid'=>Str::uuid(),
            'island_id'=>$request->island_id,
            'village_name'=>$request->village_name,
            'village_description'=>$request->village_description]);


        return redirect()->route('village.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show($uuid)
    {

        $village = village::where('uuid', $uuid)->firstOrFail();
        $islands = island::find($uuid);
		return view('villages.show')
	        ->with('village',$village)
            ->with('islands',$islands);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $village = village::where('uuid', $id)->firstOrFail();
        $islands = Island::all()->toArray();
      
		return view('villages.edit')->withVillage($village)
        ->withIslands($islands);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $uuid)
    {
        // $village = $request->all();
        $data = Village::find($uuid)->update($request->all());
           return redirect()->route('village.index')->with('message', 'Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
