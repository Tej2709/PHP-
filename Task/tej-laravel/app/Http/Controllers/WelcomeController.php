<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    
    public function index()
    {
        $data = Product::latest()->paginate(3);
        $datanew['newdata'] = " ";

        return view('welcome', compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 3);
    }
}
