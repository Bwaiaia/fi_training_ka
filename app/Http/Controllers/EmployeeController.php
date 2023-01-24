<?php

namespace App\Http\Controllers;

use App\Models\Designation;
use App\Models\Employee;
use App\Models\Department;
use DB;
use Illuminate\Http\Request;
use PDF;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
class EmployeeController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {

		$employees = Employee::all();
			
		return view('employees.index', compact('employees'));
	}

	

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employees.create');
    }

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		
		            $input = $request->all();
	
					$results = Employee::create(['fname'=>$request->id,
												  'lname'=>$request->id,
												   'age'=>$request->id,
												    'island'=>$request->id]);

			
				return redirect()->route('employee.index')->with('exception', 'Operation failed !');
	}

	

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
	
		$employee = Employee::find($id);

		return view('employees.show')
	        ->with('employee',$employee);

	}

	

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		
        $employee = Employee::find($id)->toArray();
		return view('employees.edit')->withEmployee($employee);
        
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id){
        
          $employee = $request->all();
         $data = Employee::find($id)->update($employee);


			return redirect()->route('employee.index')->with('message', 'Updated successfully.');
	
    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		
		return redirect()->route('/employee')->with('exception', 'Operation failed !');
	}

	

}
