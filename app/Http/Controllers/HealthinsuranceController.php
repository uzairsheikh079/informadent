<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Healthinsurance;

class HealthinsuranceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         $no = $request->no;

        
        if(!$no) {
           $no = 5;
        }

        $searchTerm = $request->healthinsurance_name;
        if (!$searchTerm) {
            $searchTerm = '';
        }
        $allHi = Healthinsurance::query();
        $allHi->orWhere('id', 'LIKE', '%' . $searchTerm . '%')
            ->orWhere('healthinsurance_name', 'LIKE', '%' . $searchTerm . '%');
        $healthinsurances = $allHi->orderBy('id', 'DESC')->paginate($no);
        $count = Healthinsurance::count();    

        return view('healthinsurances.index',compact('healthinsurances', 'no', 'searchTerm', 'count'))
            ->with('i', (request()->input('page', 1) - 1) * $no);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('healthinsurances.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'healthinsurance_name' => 'required',
        ]);
    
        Healthinsurance::create($request->all());
     
        return redirect()->route('healthinsurances.index')
                        ->with('success','Healthinsurance created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Healthinsurance $healthinsurance)
    {
        return view('healthinsurances.show',compact('healthinsurance'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Healthinsurance $healthinsurance)
    {
        return view('healthinsurances.edit',compact('healthinsurance'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Healthinsurance $healthinsurance)
    {
        $request->validate([
            'healthinsurance_name' => 'required',
        ]);
    
        $healthinsurance->update($request->all());
    
        return redirect()->route('healthinsurances.index')
                        ->with('success','Healthinsurance updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Healthinsurance $healthinsurance)
    {
        $healthinsurance->delete();
    
        return redirect()->route('healthinsurances.index')
                        ->with('success','Healthinsurance deleted successfully');
    }
}
