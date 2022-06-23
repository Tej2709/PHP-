<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;

class CaptchaController extends Controller
{
    public function index()
    {
        return view('index');
    }


    public function submit_form(Request $Request)
    {
            $Request->validate([
                'name'=>'required',
                'email'=>'required',
                'captcha'=>'required|captcha',

            ]);
    }

    public function reload()
    {
            return response()->json(['captch'=>captcha_img()]);
    }


}
