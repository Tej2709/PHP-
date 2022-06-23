<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('formwithcaptcha');
    }

    public function capthcaFormValidate(Request $Request)
    {
        $Request->validate ([

            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
            'captcha'=>'required| captcha',

        ]);


        return redirect()->back()
        ->with('success', 'Submitted successfully');
    }



    public function reloadCaptcha()
    {
        return response()->json(['captcha'=>captcha_img()]);
    }
}
