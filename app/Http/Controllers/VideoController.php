<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Auth;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class VideoController extends Controller
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
        $searchTerm = $request->video_name;
        if (!$searchTerm) {
            $searchTerm = '';
        }
         $allVides = Video::query();
         $allVides->orWhere('id', 'LIKE', '%' . $searchTerm . '%')
            ->orWhere('video_name', 'LIKE', '%' . $searchTerm . '%')
            ->orWhere('video_title', 'LIKE', '%' . $searchTerm . '%')
            ->orWhere('video_category', 'LIKE', '%' . $searchTerm . '%');
            // ->orWhere('privately_insured_cuecard_description', 'LIKE', '%' . $searchTerm . '%')
            // ->orWhere('privately_insured_patient_short_description', 'LIKE', '%' . $searchTerm . '%')
            // ->orWhere('privately_insured_patient_long_description', 'LIKE', '%' . $searchTerm . '%')
            // ->orWhere('privately_insured_doctor_long_description', 'LIKE', '%' . $searchTerm . '%')
            // ->orWhere('legaly_insured_cuecard_description', 'LIKE', '%' . $searchTerm . '%')
            // ->orWhere('legaly_insured_patient_short_description', 'LIKE', '%' . $searchTerm . '%')
            // ->orWhere('legaly_insured_patient_long_description', 'LIKE', '%' . $searchTerm . '%')
            // ->orWhere('legaly_insured_doctor_long_description', 'LIKE', '%' . $searchTerm . '%');
        $videos = $allVides->orderBy('id', 'DESC')->with('user')->paginate($no);
        $count = Video::count();
        
        return view('videos.index', compact('videos', 'no', 'searchTerm', 'count'))
        ->with('i', (request()->input('page', 1) - 1) * $no);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('videos.create');
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
        $uploadedFileUrl = Cloudinary::uploadVideo($request->file('video_url')->getRealPath())->getSecurePath();
        // $uploadedFileUrl = Cloudinary::upload($request->file('video_url')->getRealPath())->getSecurePath();

        Video::create([
            'user_id' => Auth::id(),
            'video_name' => $request->video_name,
            'video_title' => $request->video_title,
            'video_category' => $request->video_category,
            'privately_insured_cuecard_description' => $request->privately_insured_cuecard_description,
            'privately_insured_patient_short_description'  => $request->privately_insured_patient_short_description,
            'privately_insured_patient_long_description'  => $request->privately_insured_patient_long_description,
            'privately_insured_doctor_long_description'  => $request->privately_insured_doctor_long_description,
            'legaly_insured_cuecard_description'  => $request->legaly_insured_cuecard_description,
            'legaly_insured_patient_short_description'  => $request->legaly_insured_patient_short_description,
            'legaly_insured_patient_long_description'  => $request->legaly_insured_patient_long_description,
            'legaly_insured_doctor_long_description'  => $request->legaly_insured_doctor_long_description,
            'video_url' => $uploadedFileUrl
        ]);

        return redirect()->route('videos.index')->with('success', "Video Created Succesfully.");        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $video =Video::where('id', $id)->with('user')->first();
        return view('videos.show', compact('video'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $video = Video::where('id', $id)->first();

        return view('videos.edit', compact('video'));
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
        $video = Video::find($id);

        $videoUrl = $video->video_url;


        if($request->file('video_url')){
            $videoUrl = Cloudinary::uploadVideo($request->file('video_url')->getRealPath())->getSecurePath();
        }

        $video->update([
            'user_id' => Auth::id(),
            'video_name' => $request->video_name,
            'video_title' => $request->video_title,
            'video_category' => $request->video_category,
             'privately_insured_cuecard_description' => $request->privately_insured_cuecard_description,
            'privately_insured_patient_short_description'  => $request->privately_insured_patient_short_description,
            'privately_insured_patient_long_description'  => $request->privately_insured_patient_long_description,
            'privately_insured_doctor_long_description'  => $request->privately_insured_doctor_long_description,
            'legaly_insured_cuecard_description'  => $request->legaly_insured_cuecard_description,
            'legaly_insured_patient_short_description'  => $request->legaly_insured_patient_short_description,
            'legaly_insured_patient_long_description'  => $request->legaly_insured_patient_long_description,
            'legaly_insured_doctor_long_description'  => $request->legaly_insured_doctor_long_description,
            'video_url' =>$videoUrl
        ]);

        return redirect()->route('videos.index')->with('success', "Video updated Succesfully.");
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video = Video::find($id);

        $video->delete();

        return redirect()->route('videos.index')->with('success', "Video Deleted Succesfully.");
    }
}
