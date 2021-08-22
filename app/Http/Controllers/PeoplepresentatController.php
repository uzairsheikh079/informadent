<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peoplepresentat;

class PeoplepresentatController extends Controller
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
        $searchTerm = $request->ppa_name;
        if (!$searchTerm) {
            $searchTerm = '';
        }
        $allPpa = Peoplepresentat::query();
        $allPpa->orWhere('id', 'LIKE', '%' . $searchTerm . '%')
            ->orWhere('ppa_name', 'LIKE', '%' . $searchTerm . '%');
        $peoplepresentat = $allPpa->orderBy('id', 'DESC')->paginate($no);
        $count = peoplepresentat::count();
        
    
        return view('peoplepresentat.index',compact('peoplepresentat', 'no', 'searchTerm', 'count'))
            ->with('i', (request()->input('page', 1) - 1) * $no);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('peoplepresentat.create');
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
            'ppa_name' => 'required',
        ]);
    
        Peoplepresentat::create($request->all());
     
        return redirect()->route('peoplepresentat.index')
                        ->with('success','People Present At created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Peoplepresentat $peoplepresentat)
    {
        return view('peoplepresentat.show',compact('peoplepresentat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Peoplepresentat $peoplepresentat)
    {
        return view('peoplepresentat.edit',compact('peoplepresentat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Peoplepresentat $peoplepresentat)
    {
        $request->validate([
            'ppa_name' => 'required',
        ]);
    
        $peoplepresentat->update($request->all());
    
        return redirect()->route('peoplepresentat.index')
                        ->with('success','People Present At updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Peoplepresentat $peoplepresentat)
    {
        $peoplepresentat->delete();
    
        return redirect()->route('peoplepresentat.index')
                        ->with('success','People Present At deleted successfully');
    }
}
