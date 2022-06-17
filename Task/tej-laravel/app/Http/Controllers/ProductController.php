<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function  __construct()
    {
        $this->middleware('auth');
    }


    public function filterProduct(Request $request)
    {
        $query = Product::query();
        $categories = Category::all();
        if ($request->ajax()) {
            if (empty($request->category)) 
            {
                $products = $query->get();
            }

            else
            {
            $products = $query->where(['catid' => $request->category])->get();
            }
            return response()->json($products);
        }
        
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $data = Product::latest()->paginate(30);
        $datanew['newdata'] = " ";
        $data1 = Category::where('active', 'yes')->get('cname');
        return view('product.index', compact('data', 'datanew', 'data1'))->with('i', (request()->input('page', 1) - 1) * 30);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Category::where('active', 'yes')->get('cname');
        return view('product.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $data = categories::all();
        $request->validate([

            'pname' => 'required',
            'catid' => 'required',
            'image' => 'required | image |mimes : JPEG,png,jpg|max:20048',
           
            'active' => 'required',
        ], [
            'pname.required' => 'Product Name required',
            'catid.required' => 'Please Select a Category',
            'image.required' => 'Please Upload Image',
            'image.type' => 'Only upload JPEG,png,jpg Formats',
            'image.size' => 'Upload Size less than 2mb',
            'active.required' => 'Please select active field',
            
        ]);

        $imageName = time() . '.' . $request->image->extension();

        $request->image->move(public_path('public/images'), $imageName);

        $product = $request->all();

        $product['image'] = $imageName;

        Product::create($product);



        return redirect()->route('product.index')->with('success', 'product Added successfully.' );
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $data = Category::get('cname');
        return view('product.edit', compact('product', 'data'));
    }

    /**
     * Update the specified resource in storage.
     * 
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {

        if (!empty($request->image)) 
        {

            unlink(public_path('public/images/' . $product->image));
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('public/images'), $imageName);
            $product->pname = $request->pname;
            $product->catid = $request->category;
            $product->active = $request->active;
            // $product=$request->all();
            // $product['createdbyuser']=$user->id;
            $product['image'] = $imageName;
            $product->update();
            return redirect('product')->with('success', 'Product updated successfully ');
        } 
        else 
        {

            $product->pname = $request->pname;
            $product->catid = $request->category;
            $product->active = $request->active;
            // $product['createdbyuser']=$user->id;
            $product->update();
            return redirect('product')->with('success', 'Product updated successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index')->with('success', 'Product deleted successfully');
    }
}
