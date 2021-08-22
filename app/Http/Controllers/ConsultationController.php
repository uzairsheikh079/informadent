<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Healthinsurance;
use App\Models\Diagnose;
use DB;


class ConsultationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard2');
    }

    public function edit()
    {
        $healthinsurances = DB::table('health_insurances')->get();
        $people = DB::table('people_present_at')->get();
        $consents = DB::table('patient_consents')->get();
        //$diagnosis = DB::table('diagnosis')->get();
       //$findings = DB::table('findings')->get();

        $diagnosesTableData = DB::table('diagnosis')
        ->leftJoin('findings', 'diagnosis.id', '=', 'findings.diagnose_id')
        ->select('diagnosis.id as did', 'diagnosis.diagnose_name', 'diagnosis.degree', 'diagnosis.parent_id', 'findings.id', 'findings.finding_name')
        ->get();

        return view('consultation.mainscreen', compact('healthinsurances', 'people', 'consents', 'diagnosesTableData'));
    }
}
