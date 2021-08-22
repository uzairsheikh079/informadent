<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Document;
use App\Models\Checkpoint;
use Illuminate\Support\Facades\Auth;
use DB;

class DocumentController extends Controller
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
        $searchTerm = $request->document_name;

        if (!$searchTerm) {
            $searchTerm = '';
        }

        $allDocuments = Document::query();


        $allDocuments->orWhere('id', 'LIKE', '%' . $searchTerm . '%')
            ->orWhere('document_name', 'LIKE', '%' . $searchTerm . '%')
            ->orWhere('document_title', 'LIKE', '%' . $searchTerm . '%')
            ->orWhere('document_category', 'LIKE', '%' . $searchTerm . '%');

        $documents = $allDocuments->orderBy('id', 'DESC')->with('image', 'user')->paginate($no);
        $checkpoints = Checkpoint::all();
        $count = Document::count();

        return view('documents.index', compact('documents', 'checkpoints', 'searchTerm', 'no', 'count'))
            ->with('i', (request()->input('page', 1) - 1) * $no);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $image = DB::table('images')->where('image_category', 'Document')->orderBy('image_name')->get();
        $checkpoints = Checkpoint::all();
        return view('documents.create', compact('image', 'checkpoints'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $checkpointjson = json_encode($request->checkpoint_id);
        Document::create([
            'user_id' => Auth::id(),
            'image_id' => $request->image_id,
            'checkpoint_id' => $checkpointjson,
            'document_name' => $request->document_name,
            'document_title' => $request->document_title,
            'document_category' => $request->document_category,
            ]);
        
        return redirect()->route('documents.index')->with('success', 'Document added successfully.');  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $document = Document::where('id', $id)->with('user', 'image')->first();
        $checkpoints = Checkpoint::all();
        return view('documents.show', compact('document', 'checkpoints'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $document = Document::where('id', $id)->with('user', 'image')->first();

        $images = DB::table('images')->where('image_category', 'Document')->orderBy('image_name')->get();

        $checkpoints = Checkpoint::all();
        $documentcheckpoint = $document->checkpoint_id;

        $arrayOfdocumentcheckpoint = json_decode($documentcheckpoint);
        return view('documents.edit', compact('images', 'document', 'checkpoints', 'arrayOfdocumentcheckpoint'));
    }

    /**
     * first convert the json to array
     * then loop through the texts and if any is in the arry up
     * mark as selected
     * then loop the remaining ones without adding selected
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $document = Document::find($id);
        $checkpointjson = json_encode($request->checkpoint_id);

        $document->update($request->all());

        return redirect()->route('documents.index')->with('success', 'Document updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $document = Document::find($id);

        $document->delete();

        return redirect()->route('documents.index')->with('success', "Document Deleted Succesfully.");


    }
}
