<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;

class AdminController extends Controller
{
    public function index()
    {
        $data =User::where('usertype','0')->latest()->paginate(30);
        //$datanew=["newdata"]= " ";
        return view('admin.index',compact('data'))->with('i', (request()->input('page',1)-1)*30);
    }

    public function create()
    {
        return view ('admin.create');
    }

    public function store(Request $Request)
    {
        $Request->validate([
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
    $user =new User();
    $user->name = $Request->name;
    $user->email = $Request->email;
    $user->password =Hash::make($Request->password);
    $user->gender = $Request->gender;
    $user->hobbies = $Request->hobbies;
    }

    public function edit(User $admin)
    {
        return view('admin.edit',compact('admin'));
    }

    public function update(Request $Request , User $admin)

    {
            $Request->validate([
                'name' => 'required|min:2|max:15',
                'email' => 'required|unique:users,email,'.$admin->id.',id',
                'password' => 'required',
                'gender' => 'required',
                'hobbies' => 'required',
            ]);

            $request_data = $Request->all();
            $admin->update($request_data);
            return redirect()->route('admin.index')->with('success', 'Updated Successfully');

    }


    public function destroy(User $admin)
    {
        $admin->delete();
        return redirect()->route('admin.index')->with('success', 'Admin Deleted Successfully');
    }
}
