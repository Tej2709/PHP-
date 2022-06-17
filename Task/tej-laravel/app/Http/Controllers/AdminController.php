<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{

    public function  __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::where('usertype','0')->latest()->paginate(30);
        $datanew['newdata'] = " ";
        return view('admin.index', compact('data', 'datanew'))->with('i', (request()->input('page', 1) - 1) * 30);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|min:2|max:15',
            'email' => 'required|email',
            'password' => 'required',
            'gender' => 'required',
            'hobbies' => 'required',

        ],
    [
        'name.required' => 'Name is required',
        'name.min' => 'Name should be at least minumum 2 characters',
        'name.max' => 'The maximum value should only be 15 characters ',
        'email.required' => 'Email is required',
        'password.required' => 'Password is required',
        'gender.required' => 'Please select a gender',
        'hobbies.required' => 'Please checcked at least one hobbies',
    ]);
        
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->hobbies = $request->hobbies;
        $user->password = Hash::make($request->password);
        $user->save();
       
       // User::create($user);
        return redirect()->route('admin.index')->with('success', 'Admin Successfully Added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return view('admin.show', compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param App\Models\User $admin
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $admin)
    {
       
        return view('admin.edit', compact('admin'));
      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param \App\Models\User $admin
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $admin)
    {

       
        $request->validate([
            'name' => 'required|min:2|max:100',
            'email' => 'required|unique:admins,email,'.$admin->id.',id',
            'gender' => 'required',
            'hobbies' => 'required',

        ]);

        // $user = new User;
        // $request_data = $request->all();
        // $request_data['gender'] = 'active';
        $request_data = $request->all();
        $admin->update($request_data);
        return redirect()->route('admin.index')->with('success', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(User $admin)
    {
        $admin->delete();
        return redirect()->route('admin.index')->with('success', 'Admin deleted successfully');
    }
}
