<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Validator;
use Whoops\Run;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $data=User::latest()->get()->all();
        $datanew['newdata'] = " ";
        return view('admin.index',compact('data','datanew'));
    }


    public function create()
    {
        return view('admin.create');
    }


    public function show()
    {
        
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2|max:20',
            'email' => 'required|email|max:20',
            'password' => 'required|password',
            'gender'=>'required',
            'hobbies'=>'required',

        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email= $request->email;
        $user->gender = $request->gender;
        $user->name = $request->hobbies;
        $user->password = Hash::make($request->password);

        return redirect()->route('admin.index')->with('success', "User created successfully");

    }



    public function edit(User $admin)
    {
        return view('admin.edit',compact('admin'));
    }


    public function update(Request $request,User $admin )
    {
        $request->validate([
            'name' => 'required|min:2|max:20',
            'email' => 'required|email|max:20|unique:users',
            'password' => 'required|password',
            'gender'=>'required',
            'hobbies'=>'required',

        ]);

        $request_data = $request->all();
        $admin->update( $request_data);
        return redirect()->route('admin.index')->with('success', 'Admin Updated Successfully');
    }


    public function destroy(User $admin)
    {
            $admin->delete();
            return redirect()->route('admin.index')->with('success', 'Admin Deleted Successfully');
    }
}
