<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Requests\IslandStoreRequest;
use App\Http\Requests\IslandUpdateRequest;
use App\Models\Island;

class IslandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $islands = Island::all();
        //dd($employees);

        // Pass data to view
        return view('islands.index', ['islands' => $islands]);

        //return 'welcome'; //view('employees.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('islands.create');
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
            // dd($input);
        
            $results = Island::create(['island_name'=>$request->island_id]);


        return redirect()->route('island.index');
    }

    public function show($uuid)
    {
        $island = Island::where('id', $uuid)->firstOrFail();

		return view('islands.show')
	        ->with('island',$island);
    }

    public function edit($uuid)
    {
        $island = island::where('id', $uuid)->firstOrFail();
		return view('islands.edit')->withIsland($island);
    }


    public function update(Request $request, $id)
    {

        $data = Island::find($id)->update($request->all());

           return redirect()->route('island.index')->with('message', 'Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
