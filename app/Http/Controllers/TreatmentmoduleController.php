<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Treatmentmodule;
use Auth;

class TreatmentmoduleController extends Controller
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
        $searchTerm = $request->treatmentmodule_name;
        if (!$searchTerm) {
            $searchTerm = '';
        }
        $allTreatmentmodules = Treatmentmodule::query();
        $allTreatmentmodules->orWhere('id', 'LIKE', '%' . $searchTerm . '%')
            ->orWhere('treatmentmodule_name', 'LIKE', '%' . $searchTerm . '%');
        $treatmentmodules = $allTreatmentmodules->orderBy('id', 'DESC')->with('user')->paginate($no);
        $count = Treatmentmodule::count();
        return view('treatmentmodules.index',compact('treatmentmodules', 'no', 'searchTerm', 'count'))
            ->with('i', (request()->input('page', 1) - 1) * $no);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('treatmentmodules.create');
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
            'treatmentmodule_name' => 'required',
        ]);
    
        Treatmentmodule::create($request->all() + ['user_id' => Auth::id()]);
     
        return redirect()->route('treatmentmodules.index')
                        ->with('success','Treatmentmodule created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $treatmentmodule =Treatmentmodule::where('id', $id)->with('user')->first();
        return view('treatmentmodules.show',compact('treatmentmodule'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Treatmentmodule $treatmentmodule)
    {
        return view('treatmentmodules.edit',compact('treatmentmodule'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Treatmentmodule $treatmentmodule)
    {
        $request->validate([
            'treatmentmodule_name' => 'required',
        ]);
    
        $treatmentmodule->update($request->all() + ['user_id' => Auth::id()]);
    
        return redirect()->route('treatmentmodules.index')
                        ->with('success','Treatmentmodule updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Treatmentmodule $treatmentmodule)
    {
        $treatmentmodule->delete();
    
        return redirect()->route('treatmentmodules.index')
                        ->with('success','Treatmentmodule deleted successfully');
    }
}
