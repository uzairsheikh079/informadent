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

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index(User $model)
    // {
    //     return view('users.index', ['users' => $model->paginate(15)]);
    // }
    public function index(Request $request)
    {
        //pagination
        $no = $request->no;
        if (!$no) {
            $no = 5;
        }

        //search
        $searchTerm = $request->user_name;
        if (!$searchTerm) {
            $searchTerm = '';
        }
        $allUsers = User::query();
        $allUsers->orWhere('id', 'LIKE', '%' . $searchTerm . '%')
            ->orWhere('email', 'LIKE', '%' . $searchTerm . '%')
            ->orWhere('user_title', 'LIKE', '%' . $searchTerm . '%')
            ->orWhere('user_salutation', 'LIKE', '%' . $searchTerm . '%')
            ->orWhere('user_firstname', 'LIKE', '%' . $searchTerm . '%')
            ->orWhere('user_lastname', 'LIKE', '%' . $searchTerm . '%')
            ->orWhere('user_specialization', 'LIKE', '%' . $searchTerm . '%')
            ->orWhere('user_description', 'LIKE', '%' . $searchTerm . '%')
            ->orWhere('user_telephone', 'LIKE', '%' . $searchTerm . '%');
        $users = $allUsers->orderBy('id', 'DESC')->with('role', 'practice', 'image')->paginate($no);
        
        //count rows
        $count = User::count();

        return view('users.index', compact('users', 'no', 'searchTerm', 'count'))
            ->with('i', (request()->input('page', 1) - 1) * $no);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        //$images = DB::table('images')->where('image_category', '=', 'Profile Pictures')->orderBy('image_name')->get();
        $practices = Practice::all();
        $roles = Role::all();
        return view('users.create', compact('practices', 'roles'));
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
        $user->user_specialization = $request->user_specialization;
        $user->user_description = $request->user_description;
        $user->email = $request->email;
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
        
        return redirect()->route('users.index')
            ->with('success', 'Userdata created successfully.');
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
        return view('users.show', compact('user'));
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
        //$images = DB::table('images')->where('image_category', '=', 'Profile Pictures')->orderBy('image_name')->get();
        return view('users.edit', compact('user', 'practices', 'roles'));
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

        if ($request->image_url) {
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
            "user_specialization" => $request->user_specialization,
            "user_description" => $request->user_description,
            "role_id" => $request->role_id,
            "practice_id" => $request->practice_id,
            "image_id" => $imageId,
        ]);

        return redirect()->route('users.index')
            ->with('success', 'Userdata updated successfully');
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

        return redirect()->route('users.index')
            ->with('success', 'Userdata deleted successfully');
    }
}
