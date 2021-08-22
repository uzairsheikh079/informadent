<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Helper;
use App\Models\Practice;

class HelperController extends Controller
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
        $searchTerm = $request->helper_name;
        if (!$searchTerm) {
            $searchTerm = '';
        }
        $allHelpers = Helper::query();
        $allHelpers->orWhere('id', 'LIKE', '%' . $searchTerm . '%')
            ->orWhere('helper_name', 'LIKE', '%' . $searchTerm . '%');
        $helpers = $allHelpers->orderBy('id', 'DESC')->with('practice')->paginate($no);
        $count = Helper::count();

        return view('helpers.index', compact('helpers', 'no', 'searchTerm', 'count'))
            ->with('i', (request()->input('page', 1) - 1) * $no);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $practices = Practice::all();
        return view('helpers.create', compact('practices'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Helper::create($request->all());
        
        return redirect()->route('helpers.index')->with('success', 'Helper added successfully.');  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $helper = Helper::where('id', $id)->with('practice')->first();
        return view('helpers.show', compact('helper'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $helper = Helper::where('id', $id)->with('practice')->first();

        $practices = Practice::all();

        return view('helpers.edit', compact('practices', 'helper'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $helper = Helper::find($id);

        $helper->update($request->all());

        return redirect()->route('helpers.index')->with('success', 'Helper updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $helper = Helper::find($id);

        $helper->delete();

        return redirect()->route('helpers.index')->with('success', "Helper Deleted Succesfully.");


    }
}
