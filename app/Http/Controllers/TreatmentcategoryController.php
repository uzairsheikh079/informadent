<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Treatmentcategory;
use App\Models\Treatmentmodule;
use App\Models\Video;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;
use DB;

class TreatmentcategoryController extends Controller
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
        $searchTerm = $request->treatmentcategory_name;
        if (!$searchTerm) {
            $searchTerm = '';
        }
        $allTreatmentcategories = Treatmentcategory::query();
        $allTreatmentcategories->orWhere('id', 'LIKE', '%' . $searchTerm . '%')
            ->orWhere('treatmentcategory_name', 'LIKE', '%' . $searchTerm . '%');
            // ->orWhere('privately_insured_cuecard_description', 'LIKE', '%' . $searchTerm . '%')
            // ->orWhere('privately_insured_patient_short_description', 'LIKE', '%' . $searchTerm . '%')
            // ->orWhere('privately_insured_patient_long_description', 'LIKE', '%' . $searchTerm . '%')
            // ->orWhere('privately_insured_doctor_long_description', 'LIKE', '%' . $searchTerm . '%')
            // ->orWhere('legaly_insured_cuecard_description', 'LIKE', '%' . $searchTerm . '%')
            // ->orWhere('legaly_insured_patient_short_description', 'LIKE', '%' . $searchTerm . '%')
            // ->orWhere('legaly_insured_patient_long_description', 'LIKE', '%' . $searchTerm . '%')
            // ->orWhere('legaly_insured_doctor_long_description', 'LIKE', '%' . $searchTerm . '%');

        $treatmentcategories = $allTreatmentcategories->orderBy('id', 'DESC')->with('user', 'treatmentmodule')->paginate($no);

        $videos = Video::all();
        $images = Image::all();
        $count = Treatmentcategory::count();

        return view('treatmentcategories.index', compact('treatmentcategories', 'videos', 'images', 'no', 'searchTerm', 'count'))
        ->with('i', (request()->input('page', 1) - 1) * $no);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $treatmentmodules = Treatmentmodule::all();
         $videos = Video::all();
        $images = DB::table('images')->where('image_category', '!=', 'KFOBefundStills')->where('image_category', '!=', 'Document')->where('image_category', '!=', 'Profile Pictures')->where('image_category', '!=', 'Practice Logos')->orderBy('image_category')->get();


        return view('treatmentcategories.create', compact('treatmentmodules', 'videos' , 'images'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $videojson = json_encode($request->video_id);
        $imagejson = json_encode($request->image_id);
       // Treatmentcategory::create($request->all() + ['user_id' => Auth::id()]);
       Treatmentcategory::create([
            'user_id' => Auth::id(),
            'treatmentmodule_id' => $request->treatmentmodule_id,
            'treatmentcategory_name'=> $request->treatmentcategory_name,
            'privately_insured_cuecard_description' => $request->privately_insured_cuecard_description,
            'privately_insured_patient_short_description' => $request->privately_insured_patient_short_description,
            'privately_insured_patient_long_description' => $request->privately_insured_patient_long_description,
            'privately_insured_doctor_long_description' => $request->privately_insured_doctor_long_description,
            'legaly_insured_cuecard_description' => $request->legaly_insured_cuecard_description,
            'legaly_insured_patient_short_description' => $request->legaly_insured_patient_short_description,
            'legaly_insured_patient_long_description' => $request->legaly_insured_patient_long_description,
            'legaly_insured_doctor_long_description' => $request->legaly_insured_doctor_long_description,
            'video_id' => $videojson,
            'image_id' => $imagejson,
            ]);

       return redirect()->route('treatmentcategories.index')->with('success', 'Treatment Category created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Texts  $texts
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $treatmentcategory =Treatmentcategory::where('id', $id)->with('user', 'treatmentmodule')->first();
        $videos = Video::all();
        $images = DB::table('images')->where('image_category', '!=', 'KFOBefundStills')->where('image_category', '!=', 'Document')->orderBy('image_category')->get();
        return view('treatmentcategories.show', compact('treatmentcategory', 'videos', 'images'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Texts  $texts
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $treatmentcategory =Treatmentcategory::where('id', $id)->with('treatmentmodule')->first();
        $treatmentmodules = Treatmentmodule::all();
        $videos = Video::all();
        $images = DB::table('images')->where('image_category', '!=', 'KFOBefundStills')->where('image_category', '!=', 'Document')->orderBy('image_category')->get();

        $treatmentcategoryvideo = $treatmentcategory->video_id;
        $arrayOftreatmentcategoryvideo = json_decode($treatmentcategoryvideo);

        $treatmentcategoryimage = $treatmentcategory->image_id;
        $arrayOftreatmentcategoryimage = json_decode($treatmentcategoryimage);


        return view('treatmentcategories.edit', compact('arrayOftreatmentcategoryvideo', 'arrayOftreatmentcategoryimage', 'treatmentcategory', 'treatmentmodules', 'videos', 'images'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Texts  $texts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $treatmentcategory = Treatmentcategory::find($id);

        $videojson = json_encode($request->video_id);
        $imagejson = json_encode($request->image_id);
        $treatmentcategory->update([
            'user_id' => Auth::id(),
            'treatmentmodule_id' => $request->treatmentmodule_id,
            'treatmentcategory_name'=> $request->treatmentcategory_name,
            'privately_insured_cuecard_description' => $request->privately_insured_cuecard_description,
            'privately_insured_patient_short_description' => $request->privately_insured_patient_short_description,
            'privately_insured_patient_long_description' => $request->privately_insured_patient_long_description,
            'privately_insured_doctor_long_description' => $request->privately_insured_doctor_long_description,
            'legaly_insured_cuecard_description' => $request->legaly_insured_cuecard_description,
            'legaly_insured_patient_short_description' => $request->legaly_insured_patient_short_description,
            'legaly_insured_patient_long_description' => $request->legaly_insured_patient_long_description,
            'legaly_insured_doctor_long_description' => $request->legaly_insured_doctor_long_description,
            'video_id' => $videojson,
            'image_id' => $imagejson,
            ]);

        //$treatmentcategory->update($request->all() + ['user_id' => Auth::id()]);

        return redirect()->route('treatmentcategories.index')->with('success', 'Treatment Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Texts  $texts
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $treatmentcategory = Treatmentcategory::find($id);

        $treatmentcategory->delete();

        return redirect()->route('treatmentcategories.index')->with('success', 'Treatment Category deleted successfully.');
    }
}
