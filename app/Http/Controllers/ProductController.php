<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index','show']);
    }

    public function index()
    {
        $products = Product::latest()->paginate(9);
        return view('products.index',['products'=>$products]);
    }

    public function brandGetAll(Category $category){
        $products = Product::where('category_id',$category->id)->latest()->paginate(6);
        return view('products.index',['products'=>$products]);   
    }


    public function brand(Brand $brand){
        $products = Product::where('brand_id',$brand->id)->latest()->paginate(6);
        return view('products.index',['products'=>$products]);   
    }

    /**
     * Show the form for creating a new resource.
     */

     public function getBrand(Brand $brand){
        $brand_id = $brand->id;
        $category_id = $brand->category->id;
       return view('products.create')->with(['brand_id'=>$brand_id,'category_id'=>$category_id,'categories'=>Category::all()]);
    }

    public function create()
    {
        return view('products.create')->with(['categories'=>Category::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->hasFile('photo')){ 
            $path = $request->file('photo')->store('product-photos');
        }

        $product = Product::create([
            'user_id' => auth()->user()->id,
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
            'title' => $request->title,
            'price' => $request->price,
            'content' => $request->content,
            'photo'=> $path ?? "default.jpg",
        ]);

        return redirect()->route('product.index')->with('success','success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show',['product'=>$product]);
    }

    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $this->authorize('update',$product);
        return view('products.edit')->with(['product'=>$product,'categories'=>Category::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Product $product)
    {
        $this->authorize('update',$product);

        if($request->hasFile('photo')){
            if(isset($product->photo)){
                Storage::delete($product->photo);
            }

            $path = $request->file('photo')->store('product-photos');
        }

        $product->update([
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
            'title' => $request->title,
            'price' => $request->price,
            'content' => $request->content,
            'photo'=> $path ?? $product->photo,
        ]);

        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $this->authorize('delete',$product);
        if(isset($product->photo)){
            Storage::delete($product->photo);
        }

        $product->delete();

        return redirect()->route('product.index');
    }

   
}
