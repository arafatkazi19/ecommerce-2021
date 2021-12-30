<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::orderBy('title','asc')->with(['brand','category','product_images'])->get();
        return view('backend.pages.product.manage',['products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $brands = Brand::orderBy('name','asc')->get();
        $categories = Category::orderBy('title','asc')->where('is_parent',0)->get();

        return view('backend.pages.product.create',[
            'brands'=>$brands,
            'categories'=>$categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $product = new Product();
        $product->title = $request->title;
        $product->slug = Str::slug($request->title);
        $product->description = $request->description;
        $product->brand_id = $request->brand_id;
        $product->category_id = $request->category_id;
        $product->quantity = $request->quantity;
        $product->regular_price = $request->regular_price;
        $product->offer_price = $request->offer_price;
        $product->is_featured = $request->is_featured;
        $product->status = $request->status;
        $product->tags = $request->tags;

        //dd($product);

        $product->save();

        if (count($request->product_image)>0){
            foreach ($request->product_image as $image){
                $img = rand(1,999999). '-'.$image->getClientOriginalName();
                $path = public_path('backend/img/products/'. $img);
                Image::make($image)->save($path);

                $productImage = new ProductImage();
                $productImage->product_id = $product->id;
                $productImage->product_image = $img;
                $productImage->save();

            }
        }

        return redirect()->route('product.manage');



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
    public function edit($id)
    {
        //
        $product = Product::find($id);
        if (!is_null($product)){
            $brands = Brand::orderBy('name','asc')->get();
            $categories = Category::orderBy('title','asc')->where('is_parent',0)->get();
            return view('backend.pages.product.edit',[
                'product'=>$product,
                'brands'=>$brands,
                'categories'=>$categories
            ]);

        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $product = Product::find($id);
        $product->title = $request->title;
        $product->slug = Str::slug($request->title);
        $product->description = $request->description;
        $product->brand_id = $request->brand_id;
        $product->category_id = $request->category_id;
        $product->quantity = $request->quantity;
        $product->regular_price = $request->regular_price;
        $product->offer_price = $request->offer_price;
        $product->is_featured = $request->is_featured;
        $product->status = $request->status;
        $product->tags = $request->tags;

        //dd($product);
        $product->save();

        return redirect()->route('product.manage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $product = Product::find($id);

        if (!is_null($product)){
            $product->delete();
            return redirect()->route('product.manage');
        } else{
            //404
            return redirect()->route('product.manage');

        }
    }
}
