<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Treatmenttype; 

class TreatmenttypeController extends Controller
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
        $searchTerm = $request->treatmenttype_name;
        if (!$searchTerm) {
            $searchTerm = '';
        }
        $allTreatmenttypes = Treatmenttype::query();
        $allTreatmenttypes->orWhere('id', 'LIKE', '%' . $searchTerm . '%')
            ->orWhere('treatmenttype_name', 'LIKE', '%' . $searchTerm . '%');
        $treatmenttypes = $allTreatmenttypes->orderBy('id', 'DESC')->paginate($no);
        $count = Treatmenttype::count();
        
        return view('treatmenttypes.index',compact('treatmenttypes', 'no', 'searchTerm', 'count'))
            ->with('i', (request()->input('page', 1) - 1) * $no);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('treatmenttypes.create');
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
            'treatmenttype_name' => 'required',
        ]);
    
        Treatmenttype::create($request->all());
     
        return redirect()->route('treatmenttypes.index')
                        ->with('success','Treatment type created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Treatmenttype $treatmenttype)
    {
        return view('treatmenttypes.show',compact('treatmenttype'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Treatmenttype $treatmenttype)
    {
        return view('treatmenttypes.edit',compact('treatmenttype'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Treatmenttype $treatmenttype)
    {
        $request->validate([
            'treatmenttype_name' => 'required',
        ]);
    
        $treatmenttype->update($request->all());
    
        return redirect()->route('treatmenttypes.index')
                        ->with('success','Treatment type updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Treatmenttype $treatmenttype)
    {
        $treatmenttype->delete();
    
        return redirect()->route('treatmenttypes.index')
                        ->with('success','Treatment type deleted successfully');
    }
}
