<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patientconsent;

class PatientConsentController extends Controller
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
        $searchTerm = $request->consent_name;
        if (!$searchTerm) {
            $searchTerm = '';
        }
         $allConsents = Patientconsent::query();
         $allConsents->orWhere('id', 'LIKE', '%' . $searchTerm . '%')
            ->orWhere('consent_name', 'LIKE', '%' . $searchTerm . '%');
        $patientconsents = $allConsents->orderBy('id', 'DESC')->paginate($no);
        $count = Patientconsent::count();

        return view('patientconsents.index',compact('patientconsents', 'no', 'searchTerm', 'count'))
            ->with('i', (request()->input('page', 1) - 1) * $no);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('patientconsents.create');
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
            'consent_name' => 'required',
        ]);
    
        Patientconsent::create($request->all());
     
        return redirect()->route('patientconsents.index')
                        ->with('success','Patient Consent created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Patientconsent $patientconsent)
    {
        return view('patientconsents.show',compact('patientconsent'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Patientconsent $patientconsent)
    {
        return view('patientconsents.edit',compact('patientconsent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patientconsent $patientconsent)
    {
        $request->validate([
            'consent_name' => 'required',
        ]);
    
        $patientconsent->update($request->all());
    
        return redirect()->route('patientconsents.index')
                        ->with('success','Patient Consent updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patientconsent $patientconsent)
    {
        $patientconsent->delete();
    
        return redirect()->route('patientconsents.index')
                        ->with('success','Patient Consent deleted successfully');
    }
}
