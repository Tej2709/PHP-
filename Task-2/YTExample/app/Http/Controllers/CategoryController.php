<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;


class CategoryController extends Controller
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
       
        $category = Category::latest()->paginate(30);
        $datanew['newdata'] = " ";
        
         return view('category.index',compact('category','datanew'))
        ->with('i', (request()->input('page', 1) - 1) * 30);
        
        
    }

    public function show ()
    {
        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
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
            'cname'=>'required | min:2 | max:15',
            'active'=>'required',
          
        ],
    [
        'cname.required' =>'Category name is required',
        'cname.min' =>'Category name should be minimum of 2 characters',
        'cname.max' =>'Category name should be maximum of 15',
        'active.required' =>'Please select active field',
    ]);
        $category = $request->all();
        Category::create($category);

        return redirect()->route('category.index')
        ->with('Success', 'Category created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( Category $category)
    {
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'cname' => 'required',
            'active' => 'required',
        ],
    [
        'cname.required'=>'Category Name Required',
        'active.required' =>'Please select active field',
    ]);

        $category->update($request->all());
        
         return redirect()->route('category.index')->with('success', 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('category.index')->with('success', 'Category deleted successfully');
    }
}
