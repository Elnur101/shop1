<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreRequest;
use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands = Brand::all();

        return view('admin.product.create', compact('brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        if( $request->hasFile('cover')){
            $file = $request->file('cover');
            $data['cover'] = Str::random(32).".".$file->getClientOriginalExtension();
            $file->storeAs('products', $data['cover'], 'public');
        }
        $product = Product::create([
            'name'=>$data['name'],
            'description'=>$data['description'],
            'price'=>$data['price'],
            'stock'=>$data['stock'],
            'cover'=>$data['cover'],
            'category_id'=>$data['category_id'],
            'brand_id'=>$data['brand_id'],
        ]);
        if($request->hasFile('image')){
            $files = $request->file('image');
            foreach ($files as $file){
                $data['image'] = Str::random(30).".".$file->getClientOriginalExtension();
                $data['product_id'] = $product->id;
                $data['image_path'] = $data['image'];
                $file->storeAs('product/images', $data['image_path'], 'public');
                ProductImage::create($data);
            }
        }
        return redirect()->route('admin.product.index')->with('success', "Продукт добавлен");


    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
