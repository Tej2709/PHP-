<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articledetails;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Articledetails::latest()->paginate(5);
        $datanew['newdata']="";
        
        return view('articles.index',compact('data','datanew'))
        ->with('i', (request()->input('page',1)-1) *5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
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
            'name' => 'required|min:2|max:100|unique:articledetails',
            'slug'=>'',
            'description' => 'min:50|max:1000',
            'phno'=>'max:10',
            'status' => 'required',
        ]);
    
        Articledetails::create($request->all());
     
        return redirect()->route('articles.index')
        ->with('success','Article created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Articledetails $Article)
    {
        
        return view('articles.show',compact('Article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Articledetails $Article)
    {
        return view('articles.edit',compact('Article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Articledetails $Article)
    {
        $request->validate([
            'name' => 'required|min:2|max:100|unique:articledetails,name    '.$Article->id.',id' ,
            'description' => 'min:50|max:1000',
            'phno'=>'max:10',
            'status' => 'required',
           
        ]);
      
        
        // $request_data = $request->all();
        // $request_data['gender'] = 'active'; 
        $request_data = $request->all();
        $Article->update($request_data);
        return redirect()->route('articles.index')
        ->with('success','Article updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Articledetails $Article)
    {
        $Article->delete();
    
        return redirect()->route('articles.index')
         ->with('success','Article deleted successfully');    
    }

    public function inactive()
    {
        return view('articles.inactive');
    }
}
