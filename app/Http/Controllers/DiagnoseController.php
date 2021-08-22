<?php

namespace App\Http\Controllers;

use App\Collections\Constants;
use Illuminate\Http\Request;
use App\Models\Diagnose;
use DB;
use Auth;
use Illuminate\Support\Facades\Gate;

class DiagnoseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // if (! Gate::allows('super-admin')) {
        //     abort(403);
        // }
        
        $no = $request->no;

        // $admin = Constants::ROLES_ARRAY["SUPER-ADMIN"];

        // dd($admin);
        
        if(!$no) {
           $no = 5;
        }

        //$user_role = Constants::ROLES_ARRAY["ADMIN"];

        // dd($user_role);
        $searchTerm = $request->diagnose_name;
        if (!$searchTerm) {
            $searchTerm = '';
        }
        $allDiagnosis = Diagnose::query();
        $allDiagnosis->orWhere('id', 'LIKE', '%' . $searchTerm . '%')
            ->orWhere('diagnose_name', 'LIKE', '%' . $searchTerm . '%')
            ->orWhere('parent_id', 'LIKE', '%' . $searchTerm . '%')
            ->orWhere('degree', 'LIKE', '%' . $searchTerm . '%');
        $diagnosis = $allDiagnosis->orderBy('id', 'DESC')->with('user')->paginate($no);
        $count = Diagnose::count();
    
        return view('diagnose.index',compact('diagnosis', 'no', 'searchTerm', 'count'))
            ->with('i', (request()->input('page', 1) - 1) * $no);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $diagnosis = Diagnose::all();
        return view('diagnose.create', compact('diagnosis'));
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
            'diagnose_name' => 'required',
            // 'parent_id' => 'required',
            //'degree' => 'required',
        ]);
         //dd($request);
    
        Diagnose::create($request->all() + ['user_id' => Auth::id()]);
        return redirect()->route('diagnose.index')
                        ->with('success','Diagnose created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $diagnosis =Diagnose::where('id', $id)->with('user')->first();
        return view('diagnose.show',compact('diagnosis'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Diagnose $diagnose)
    {
        $diagnosis = Diagnose::all();
        return view('diagnose.edit',compact('diagnosis', 'diagnose'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Diagnose $diagnose)
    {
        $diagnose->update($request->all() + ['user_id' => Auth::id()]);
    
        return redirect()->route('diagnose.index')
                        ->with('success','Diagnose updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Diagnose $diagnose)
    {
        $diagnose->delete();
    
        return redirect()->route('diagnose.index')
                        ->with('success','Diagnose deleted successfully');
    }
}
