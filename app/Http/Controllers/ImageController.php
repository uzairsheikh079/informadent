<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Auth;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class ImageController extends Controller
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
        $searchTerm = $request->image_name;
        if (!$searchTerm) {
            $searchTerm = '';
        }
         $allImages = Image::query();
         $allImages->orWhere('id', 'LIKE', '%' . $searchTerm . '%')
            ->orWhere('image_name', 'LIKE', '%' . $searchTerm . '%')
            ->orWhere('image_title', 'LIKE', '%' . $searchTerm . '%')
            ->orWhere('image_category', 'LIKE', '%' . $searchTerm . '%');
            // ->orWhere('privately_insured_cuecard_description', 'LIKE', '%' . $searchTerm . '%')
            // ->orWhere('privately_insured_patient_short_description', 'LIKE', '%' . $searchTerm . '%')
            // ->orWhere('privately_insured_patient_long_description', 'LIKE', '%' . $searchTerm . '%')
            // ->orWhere('privately_insured_doctor_long_description', 'LIKE', '%' . $searchTerm . '%')
            // ->orWhere('legaly_insured_cuecard_description', 'LIKE', '%' . $searchTerm . '%')
            // ->orWhere('legaly_insured_patient_short_description', 'LIKE', '%' . $searchTerm . '%')
            // ->orWhere('legaly_insured_patient_long_description', 'LIKE', '%' . $searchTerm . '%')
            // ->orWhere('legaly_insured_doctor_long_description', 'LIKE', '%' . $searchTerm . '%');
        $images = $allImages->orderBy('id', 'DESC')->with('user')->paginate($no);
        $count = Image::count(); 

        return view('images.index', compact('images', 'no', 'searchTerm', 'count'))
        ->with('i', (request()->input('page', 1) - 1) * $no);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('images.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* 
            store file in the application store
            and get the name of the uploaded file
        */

        // $file = $request->file('image_url');
        // $file->move(public_path('storage'), $file->getClientOriginalName());
        // $file = $file->getClientOriginalName();

        // upload image to cloudinary and return the url
        $uploadedFileUrl = Cloudinary::upload($request->file('image_url')->getRealPath())->getSecurePath();

        Image::create([
            'user_id' => Auth::id(),
            'image_name' => $request->image_name,
            'image_category' => $request->image_category,
            'privately_insured_cuecard_description' => $request->privately_insured_cuecard_description,
            'privately_insured_patient_short_description'  => $request->privately_insured_patient_short_description,
            'privately_insured_patient_long_description'  => $request->privately_insured_patient_long_description,
            'privately_insured_doctor_long_description'  => $request->privately_insured_doctor_long_description,
            'legaly_insured_cuecard_description'  => $request->legaly_insured_cuecard_description,
            'legaly_insured_patient_short_description'  => $request->legaly_insured_patient_short_description,
            'legaly_insured_patient_long_description'  => $request->legaly_insured_patient_long_description,
            'legaly_insured_doctor_long_description'  => $request->legaly_insured_doctor_long_description,
            'image_title' => $request->image_title,
            'image_url' =>$uploadedFileUrl
        ]);

        return redirect()->route('images.index')->with('success', "Image Created Succesfully.");        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $image =Image::where('id', $id)->with('user')->first();
        return view('images.show', compact('image'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $image = Image::where('id', $id)->first();

        return view('images.edit', compact('image'));
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
        $image = Image::find($id);

        $imageUrl = $image->image_url;


        if($request->file('image_url')){
            $imageUrl = Cloudinary::upload($request->file('image_url')->getRealPath())->getSecurePath();
        }
        $image->update([
            'user_id' => Auth::id(),
            'privately_insured_cuecard_description' => $request->privately_insured_cuecard_description,
            'privately_insured_patient_short_description'  => $request->privately_insured_patient_short_description,
            'privately_insured_patient_long_description'  => $request->privately_insured_patient_long_description,
            'privately_insured_doctor_long_description'  => $request->privately_insured_doctor_long_description,
            'legaly_insured_cuecard_description'  => $request->legaly_insured_cuecard_description,
            'legaly_insured_patient_short_description'  => $request->legaly_insured_patient_short_description,
            'legaly_insured_patient_long_description'  => $request->legaly_insured_patient_long_description,
            'legaly_insured_doctor_long_description'  => $request->legaly_insured_doctor_long_description,
            'image_name' => $request->image_name,
            'image_title' => $request->image_title,
            'image_category' => $request->image_category,
            'image_url' =>$imageUrl
        ]);

        return redirect()->route('images.index')->with('success', "Image updated Succesfully.");
    }
    
    public function ajaxFileUpload(Request $request, $image)
    {  
        $imageUrl = Cloudinary::upload($request->file('image_url')->getRealPath())->getSecurePath();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = Image::find($id);

        $image->delete();

        return redirect()->route('images.index')->with('success', "Image Deleted Succesfully.");
    }
}
