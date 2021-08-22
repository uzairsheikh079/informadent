<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Finding;
use App\Models\Image;
use App\Models\Document;
use App\Models\Diagnose;
use Illuminate\Support\Facades\Auth;
use DB;


class FindingController extends Controller
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
        $searchTerm = $request->finding_name;
        if (!$searchTerm) {
            $searchTerm = '';
        }
        $allFindings = Finding::query();
        $allFindings->orWhere('id', 'LIKE', '%' . $searchTerm . '%')
            ->orWhere('finding_name', 'LIKE', '%' . $searchTerm . '%')
            ->orWhere('step', 'LIKE', '%' . $searchTerm . '%');
            // ->orWhere('privately_insured_cuecard_description', 'LIKE', '%' . $searchTerm . '%')
            // ->orWhere('privately_insured_patient_short_description', 'LIKE', '%' . $searchTerm . '%')
            // ->orWhere('privately_insured_patient_long_description', 'LIKE', '%' . $searchTerm . '%')
            // ->orWhere('privately_insured_doctor_long_description', 'LIKE', '%' . $searchTerm . '%')
            // ->orWhere('legaly_insured_cuecard_description', 'LIKE', '%' . $searchTerm . '%')
            // ->orWhere('legaly_insured_patient_short_description', 'LIKE', '%' . $searchTerm . '%')
            // ->orWhere('legaly_insured_patient_long_description', 'LIKE', '%' . $searchTerm . '%')
            // ->orWhere('legaly_insured_doctor_long_description', 'LIKE', '%' . $searchTerm . '%');

        $findings = $allFindings->orderBy('id', 'DESC')->with('user', 'diagnose')->paginate($no);

        $images = Image::all();

        $documents = Document::all();
        $count = Finding::count();

        return view('findings.index', compact('findings', 'images', 'documents', 'no', 'searchTerm', 'count'))
            ->with('i', (request()->input('page', 1) - 1) * $no);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $images = DB::table('images')->where('image_category', 'KFOBefundStills')->orderBy('image_name')->get();

        $documents = DB::table('documents')->where('document_category', 'Befunde')->orderBy('document_name')->get();

        $diagnosis = Diagnose::all();

        return view('findings.create', compact('images', 'documents', 'diagnosis'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $imagejson = json_encode($request->image_id);
        $documentjson = json_encode($request->document_id);
        Finding::create([
            'user_id' => Auth::id(),
            'image_id' => $imagejson,
            'document_id' => $documentjson,
            'finding_name' => $request->finding_name,
            'step' => $request->step,
            'diagnose_id' => $request->diagnose_id,
            'privately_insured_cuecard_description' => $request->privately_insured_cuecard_description,
            'privately_insured_patient_short_description' => $request->privately_insured_patient_short_description,
            'privately_insured_patient_long_description' => $request->privately_insured_patient_long_description,
            'privately_insured_doctor_long_description' => $request->privately_insured_doctor_long_description,
            'legaly_insured_cuecard_description' => $request->legaly_insured_cuecard_description,
            'legaly_insured_patient_short_description' => $request->legaly_insured_patient_short_description,
            'legaly_insured_patient_long_description' => $request->legaly_insured_patient_long_description,
            'legaly_insured_doctor_long_description' => $request->legaly_insured_doctor_long_description,
            ]);
        
        return redirect()->route('findings.index')->with('success', 'Finding added successfully.');  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $finding = Finding::where('id', $id)->with('user', 'diagnose')->first();
        $images = Image::all();
        $documents = Document::all();
        return view('findings.show', compact('finding', 'images', 'documents'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $finding = Finding::where('id', $id)->with('diagnose')->first();

        $images = DB::table('images')->where('image_category', 'KFOBefundStills')->orderBy('image_name')->get();
        //$images = Image::all();

        $documents = DB::table('documents')->where('document_category', 'Befunde')->orderBy('document_name')->get();
        $diagnosis = Diagnose::all();
        $findingdocument = $finding->document_id;

        $arrayOffindingdocument = json_decode($findingdocument);

        $findingimage = $finding->image_id;

        $arrayOffindingimage = json_decode($findingimage);
        return view('findings.edit', compact('arrayOffindingdocument', 'arrayOffindingimage',  'images', 'documents', 'finding', 'diagnosis'));
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
        $finding = Finding::find($id);
        $imagejson = json_encode($request->image_id);
        $documentjson = json_encode($request->document_id);
        
        // Finding::update([
        // //     'user_id' => Auth::id(),
        // //     'image_id' => $imagejson,
        // //     'document_id' => $documentjson,
        // //     'finding_name' => $request->finding_name,
        // //     'step' => $request->step,
        // //     'diagnose_id' => $request->diagnose_id,
        // //     'text_id' => $request->text_id,
        // //     ]);
        $finding->update([
            'user_id' => Auth::id(),
            'image_id' => $imagejson,
            'document_id' => $documentjson,
            'finding_name' => $request->finding_name,
            'step' => $request->step,
            'diagnose_id' => $request->diagnose_id,
            'privately_insured_cuecard_description' => $request->privately_insured_cuecard_description,
            'privately_insured_patient_short_description' => $request->privately_insured_patient_short_description,
            'privately_insured_patient_long_description' => $request->privately_insured_patient_long_description,
            'privately_insured_doctor_long_description' => $request->privately_insured_doctor_long_description,
            'legaly_insured_cuecard_description' => $request->legaly_insured_cuecard_description,
            'legaly_insured_patient_short_description' => $request->legaly_insured_patient_short_description,
            'legaly_insured_patient_long_description' => $request->legaly_insured_patient_long_description,
            'legaly_insured_doctor_long_description' => $request->legaly_insured_doctor_long_description,
            ]);

        return redirect()->route('findings.index')->with('success', 'Finding updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $findings = Finding::find($id);

        $findings->delete();

        return redirect()->route('findings.index')->with('success', "Finding Deleted Succesfully.");


    }
}
