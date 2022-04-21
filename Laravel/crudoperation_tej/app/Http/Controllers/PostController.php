<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Post::latest()->paginate(2);
        $datanew['newdata'] = "";
    
        return view('posts.index',compact('data','datanew'))
        ->with('i', (request()->input('page', 1) - 1) * 2);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
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
            'fname' => 'required|min:2|max:8',
            'lname' => 'required|min:4|max:25',
            'email' => 'required|email|unique:posts',
            'gender' => 'required',
            'designation' =>'required',
            'description' => 'required|max:50',
        ],);
    
        Post::create($request->all());
     
        return redirect()->route('posts.index')
        ->with('success','Post created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'fname' => 'required|min:2|max:8',
            'lname' => 'required|min:4|max:8',
            'email' => 'required|unique:posts,email,'.$post->id.',id',
            'gender' => 'required',
            'designation'=>'required',
            'description' => 'required|max:50',
        ]);

        
        // $request_data = $request->all();
        // $request_data['gender'] = 'active'; 
        $request_data = $request->all();
        $post->update($request_data);
        return redirect()->route('posts.index')
        ->with('success','Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
    
        return redirect()->route('posts.index')
         ->with('success','Post deleted successfully');    
    }
}
