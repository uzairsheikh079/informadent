<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clinic;
use App\Models\Image;
use App\Models\Practice;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PracticeController extends Controller
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

        $searchTerm = $request->practice_name;

        if (!$searchTerm) {
            $searchTerm = '';
        }

        $allPractices = Practice::query();


        $allPractices->orWhere('id', 'LIKE', '%' . $searchTerm . '%')
            ->orWhere('practice_name', 'LIKE', '%' . $searchTerm . '%')
            ->orWhere('practice_email', 'LIKE', '%' . $searchTerm . '%')
            ->orWhere('practice_address', 'LIKE', '%' . $searchTerm . '%')
            ->orWhere('practice_telephone', 'LIKE', '%' . $searchTerm . '%');
        $practices = $allPractices->orderBy('id', 'DESC')->with('clinic', 'image')->paginate($no);
        $count = Practice::count(); 

        return view('practices.index', compact('practices', 'searchTerm', 'no', 'count'))
            ->with('i', (request()->input('page', 1) - 1) * $no);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $images = DB::table('images')->where('image_category', '=', 'Practice Logos')->orderBy('image_name')->get();
        $clinic = Clinic::all();
        return view('practices.create', compact('images', 'clinic'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $imageId = $request->image_id;

        if ($request->image_url) {
            $image = new Image;
            $image->user_id = Auth::id();
            $image->image_name = $request->practice_name;
            $image->image_category = "Practice Logos";
            $image->image_title = $request->practice_name;
            $imageUrl = Cloudinary::upload($request->file('image_url')->getRealPath())->getSecurePath();
            $image->image_url = $imageUrl;
            $image->save();

            $imageId = $image->id;
        }

        $practice = new Practice;
        $practice->image_id = $imageId;
        $practice->clinic_id = $request->clinic_id;
        $practice->practice_name = $request->practice_name;
        $practice->practice_address = $request->practice_address;
        $practice->street_no = $request->street_no;
        $practice->house_no = $request->house_no;
        $practice->post_code = $request->post_code;
        $practice->city = $request->city;
        $practice->country = $request->country;
        $practice->practice_email = $request->practice_email;
        $practice->practice_telephone = $request->practice_telephone;
        $practice->save();

        return redirect()->route('practices.index')->with('success', 'Practice added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $practice = Practice::where('id', $id)->with('clinic', 'image')->first();
        return view('practices.show', compact('practice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $practice = Practice::where('id', $id)->with('clinic', 'image')->first();

        $images = DB::table('images')->where('image_category', '=', 'Practice Logos')->orderBy('image_name')->get();


        $clinics = Clinic::all();

        return view('practices.edit', compact('images', 'clinics', 'practice'));
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
        $practice = Practice::find($id);

        $imageId = $request->image_id;

        if ($request->image_url) {
            $image = new Image;
            $image->user_id = Auth::id();
            $image->image_name = $request->practice_name;
            $image->image_category = "Practice Logos";
            $image->image_title = $request->practice_name;
            $imageUrl = Cloudinary::upload($request->file('image_url')->getRealPath())->getSecurePath();
            $image->image_url = $imageUrl;
            $image->save();

            $imageId = $image->id;
        }

        $practice->update([
            "image_id" => $imageId,
            "clinic_id" => $request->clinic_id,
            "practice_name" => $request->practice_name,
            "street_no" => $request->street_no,
            "practice_address" => $request->practice_address,
            "house_no" => $request->house_no,
            "post_code" => $request->post_code,
            "city" => $request->city,
            "country" => $request->country,
            "practice_email" => $request->practice_email,
            "practice_telephone" => $request->practice_telephone,
        ]);

        return redirect()->route('practices.index')->with('success', 'Practice updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $practice = Practice::find($id);

        $practice->delete();

        return redirect()->route('practices.index')->with('success', "Practice Deleted Succesfully.");
    }
}