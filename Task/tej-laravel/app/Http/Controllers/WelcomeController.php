<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{

    public function filterProduct(Request $request)
    {
        $query = Product::query();
        $categories = Category::all();
        if ($request->ajax()) {
            if (empty($request->category)) {
                $products = $query->get();
            }



            $products = $query->where(['catid' => $request->category])->get();
            return response()->json($products);
        }
        
    }

    public function index()
    {
        $data = Product::latest()->paginate(3);
        $datanew['newdata'] = " ";
        $data1=Category::get('cname');

        return view('welcome', compact('data','datanew','data1'))
            ->with('i', (request()->input('page', 1) - 1) * 4);
    }
}
