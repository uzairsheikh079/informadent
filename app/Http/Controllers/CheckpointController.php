<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Checkpoint;
use Auth;

class CheckpointController extends Controller
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
        $searchTerm = $request->checkpoint_name;
        if (!$searchTerm) {
            $searchTerm = '';
        }
         $allCheckpoints = Checkpoint::query();
         $allCheckpoints->orWhere('id', 'LIKE', '%' . $searchTerm . '%')
            ->orWhere('checkpoint_name', 'LIKE', '%' . $searchTerm . '%');
            // ->orWhere('privately_insured_cuecard_description', 'LIKE', '%' . $searchTerm . '%')
            // ->orWhere('privately_insured_patient_short_description', 'LIKE', '%' . $searchTerm . '%')
            // ->orWhere('privately_insured_patient_long_description', 'LIKE', '%' . $searchTerm . '%')
            // ->orWhere('privately_insured_doctor_long_description', 'LIKE', '%' . $searchTerm . '%')
            // ->orWhere('legaly_insured_cuecard_description', 'LIKE', '%' . $searchTerm . '%')
            // ->orWhere('legaly_insured_patient_short_description', 'LIKE', '%' . $searchTerm . '%')
            // ->orWhere('legaly_insured_patient_long_description', 'LIKE', '%' . $searchTerm . '%')
            // ->orWhere('legaly_insured_doctor_long_description', 'LIKE', '%' . $searchTerm . '%');
        $checkpoints = $allCheckpoints->orderBy('id', 'DESC')->with('user')->paginate($no);
        $count = Checkpoint::count(); 

        return view('checkpoints.index', compact('checkpoints', 'no', 'searchTerm', 'count'))
        ->with('i', (request()->input('page', 1) - 1) * $no);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('checkpoints.create');
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
            'checkpoint_name' => 'required',
        ]);
    
        Checkpoint::create($request->all() + ['user_id' => Auth::id()]);
        
        return redirect()->route('checkpoints.index')
                        ->with('success','Checkpoint created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $checkpoints =Checkpoint::where('id', $id)->with('user')->first();
        return view('checkpoints.show',compact('checkpoints'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Checkpoint $checkpoint)
    {
        return view('checkpoints.edit',compact('checkpoint'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Checkpoint $checkpoint)
    {
        $request->validate([
            'checkpoint_name' => 'required',
        ]);
    
        $checkpoint->update($request->all() + ['user_id' => Auth::id()]);
    
        return redirect()->route('checkpoints.index')
                        ->with('success','Checkpoint updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Checkpoint $checkpoint)
    {
        $checkpoint->delete();
    
        return redirect()->route('checkpoints.index')
                        ->with('success','Checkpoint deleted successfully');
    }
}
