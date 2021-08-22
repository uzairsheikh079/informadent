<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clinic;

class ClinicController extends Controller
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

        $searchTerm = $request->clinic_name;
        if (!$searchTerm) {
            $searchTerm = '';
        }
         $allClinics = Clinic::query();
         $allClinics->orWhere('id', 'LIKE', '%' . $searchTerm . '%')
            ->orWhere('clinic_name', 'LIKE', '%' . $searchTerm . '%');
        $clinics = $allClinics->orderBy('id', 'DESC')->paginate($no);

        $count = Clinic::count(); 

        return view('clinics.index',compact('clinics', 'no', 'searchTerm', 'count'))
            ->with('i', (request()->input('page', 1) - 1) * $no);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clinics.create');
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
            'clinic_name' => 'required',
        ]);
    
        clinic::create($request->all());

        
     
        return redirect()->route('clinics.index')
                        ->with('success','Clinic created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Clinic $clinic)
    {
        return view('clinics.show',compact('clinic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Clinic $clinic)
    {
        return view('clinics.edit',compact('clinic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clinic $clinic)
    {
        $request->validate([
            'clinic_name' => 'required',
        ]);
    
        $clinic->update($request->all());
    
        return redirect()->route('clinics.index')
                        ->with('success','Clinic updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clinic $clinic)
    {
        $clinic->delete();
    
        return redirect()->route('clinics.index')
                        ->with('success','Clinic deleted successfully');
    }
}
