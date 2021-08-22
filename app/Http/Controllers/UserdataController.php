<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Practice;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Mail\Gmai;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Support\Facades\Mail;

class UserdataController extends Controller
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
        
        $users = User::latest()->with('role', 'practice', 'image')->paginate($no);

        return view('userdata.index', compact('users'))
        ->with('i', (request()->input('page', 1) - 1) * $no);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $images = DB::table('images')->where('image_category', '=', 'Profile Pictures')->orderBy('image_name')->get();
        $practices = Practice::all();
        $roles = Role::all();
        return view('userdata.create', compact('images', 'practices', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'user_salutation' => 'required',
        //     'user_title' => 'required',
        //     'user_firstname' => 'required',
        //     'user_lastname' => 'required',
        //     'user_telephone' => 'required',
        //     'user_email' => 'required',
        //     'user_role' => 'required|integer',
        // ]);

        $imageId = $request->image_id;
        
        if ($request->file('image_url')) {
            $image = new Image;
            $image->user_id = Auth::id();
            $image->image_name = $request->user_firstname;
            $image->image_category = "Profile Pictures";
            $image->image_title = $request->user_firstname;
            $imageUrl = Cloudinary::upload($request->file('image_url')->getRealPath())->getSecurePath();
            $image->image_url = $imageUrl;
            $image->save();
            
            $imageId = $image->id;
        }

            $user = new User;
            $user->practice_id = $request->practice_id;
            $user->image_id = $imageId;
            $user->user_salutation = $request->user_salutation;
            $user->user_title = $request->user_title;
            $user->user_firstname = $request->user_firstname;
            $user->user_lastname = $request->user_lastname;
            $user->user_telephone = $request->user_telephone;
            $user->email = $request->user_email;
            $user->password = Hash::make($request->user_firstname);
            $user->role_id = $request->role_id;
            $user->save();

            $token = app(\Illuminate\Auth\Passwords\PasswordBroker::class)->createToken($user);
    
            $currentURL = request()->getHttpHost();
    
            $fullLink = $currentURL . '/password/reset/' . $token . '?email=' . $user->email;
    
    
            $details = [
                'title' => 'You have been added to Informadent portal',
                'body' => "click the link to reset your password " . $fullLink
            ];

            Mail::to($user->email)->send(new Gmai($details));

        // DB::transaction(function ()  use ($request) {

            // $imageId = $request->image_id;
            
            // if ($request->file('image_url')) {
            //     $image = new Image;
            //     $image->user_id = Auth::id();
            //     $image->image_name = $request->user_firstname;
            //     $image->image_category = "Profile Pictures";
            //     $image->image_title = $request->user_firstname;
            //     $imageUrl = Cloudinary::upload($request->file('image_url')->getRealPath())->getSecurePath();
            //     $image->image_url = $imageUrl;
            //     $image->save();
                
            //     $imageId = $image->id;
            // }

        //         $user = new User;
        //         $userData = new Userdata;
        //         $user->email = $request->user_email;
        //         $user->password = Hash::make($request->user_firstname);
        //         $user->role_id = $request->user_role;
        //         $user->save();
        //         $userData->user_id = $user->id;
        //         $userData->practice_id = $request->practice_id;
        //         $userData->image_id = $imageId;
        //         $userData->user_salutation = $request->user_salutation;
        //         $userData->user_title = $request->user_title;
        //         $userData->user_firstname = $request->user_firstname;
        //         $userData->user_lastname = $request->user_lastname;
        //         $userData->user_telephone = $request->user_telephone;
        //         $userData->save();
    
        //     $token = app(\Illuminate\Auth\Passwords\PasswordBroker::class)->createToken($user);
    
        //     $currentURL = request()->getHttpHost();
    
        //     $fullLink = $currentURL . '/password/reset/' . $token . '?email=' . $user->email;
    
    
        //     $details = [
        //         'title' => 'You have been added to Informadent portal',
        //         'body' => "click the link to reset your password " . $fullLink
        //     ];

        //     Mail::to($user->email)->send(new Gmai($details));

        // });
        
        return redirect()->route('userdata.index')
                        ->with('success','Userdata created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::where('id', $id)->with('practice', 'image', 'role')->first();
        return view('userdata.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::where('id', $id)->with('role', 'practice', 'image')->first();
        $practices = Practice::all();
        $roles = Role::all();
        $images = DB::table('images')->where('image_category', '=', 'Profile Pictures')->orderBy('image_name')->get();
        return view('userdata.edit',compact('user', 'practices', 'roles', 'images'));
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
        $user = User::find($id);

        $imageId = $request->image_id;
            
            if ($request->file('image_url')) {
                $image = new Image;
                $image->user_id = Auth::id();
                $image->image_name = $request->user_firstname;
                $image->image_category = "Profile Pictures";
                $image->image_title = $request->user_firstname;
                $imageUrl = Cloudinary::upload($request->file('image_url')->getRealPath())->getSecurePath();
                $image->image_url = $imageUrl;
                $image->save();
                
                $imageId = $image->id;
            }

                $user->update([
                "user_salutation" => $request->user_salutation,
                "user_title" => $request->user_title,
                "user_firstname" => $request->user_firstname,
                "user_lastname" => $request->user_lastname,
                "email" => $request->email,
                "user_telephone" => $request->user_telephone,
                "role_id" => $request->role_id,
                "practice_id" => $request->practice_id,
                "image_id" => $imageId,
            ]);
    
        return redirect()->route('userdata.index')
                        ->with('success','Userdata updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        
        $user->delete();
     
        return redirect()->route('userdata.index')
                        ->with('success','Userdata deleted successfully');
    }
}
