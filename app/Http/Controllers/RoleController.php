<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //pagination
        $no = $request->no;
        if(!$no) {
           $no = 5;
        }

        //search
        $searchTerm = $request->role_name;
        if (!$searchTerm) {
            $searchTerm = '';
        }
        $allRoles = Role::query();
        $allRoles->orWhere('id', 'LIKE', '%' . $searchTerm . '%')
            ->orWhere('role_name', 'LIKE', '%' . $searchTerm . '%');
        $roles = $allRoles->orderBy('id', 'DESC')->paginate($no);

        //count rows
        $count = Role::count();
    
        return view('roles.index',compact('roles', 'no', 'searchTerm', 'count'))
            ->with('i', (request()->input('page', 1) - 1) * $no);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
        Role::create($request->all());
     
        return redirect()->route('roles.index')
                        ->with('success','Role created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return view('roles.show',compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        return view('roles.edit',compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $role->update($request->all());
    
        return redirect()->route('roles.index')
                        ->with('success','Role updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
    
        return redirect()->route('roles.index')
                        ->with('success','Role deleted successfully');
    }
}
