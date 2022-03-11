<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use File;


class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $brands = Brand::orderBy('name','asc')->get();
        return view('backend.pages.brand.manage',['brands'=>$brands]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.pages.brand.create');
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
        $brand = new Brand();
        $brand->name = $request->name;
        $brand->slug = Str::slug($request->name);
        $brand->status = $request->status;

        if ($request->image){
            $image = $request->file('image');
            $img = time().'.'.$image->getClientOriginalExtension();
            $path = public_path('backend/img/brands/'. $img);
            Image::make($image)->save($path);
            $brand->image = $img;
        }

        $brand->save();

        $notification = array(
            'message' => 'Brand created successfully!',
            'alert-type' => 'success'
        );
        

        return redirect()->route('brand.manage')->with($notification);
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
        $brand = Brand::find($id);
        return view('backend.pages.brand.edit',['brand'=>$brand]);
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
        $brand = Brand::find($id);
        $brand->name = $request->name;
        $brand->slug = Str::slug($request->name);
        $brand->status = $request->status;


        if ($request->image){

           if (File::exists('backend/img/brands/' . $brand->image)){
               File::delete('backend/img/brands/' . $brand->image);
           }

            $image = $request->file('image');
            $img = time().'.'.$image->getClientOriginalExtension();
            $path = public_path('backend/img/brands/'. $img);
            Image::make($image)->save($path);
            $brand->image = $img;
        }

        $brand->save();
        
        $notification = array(
            'message' => 'Brand updated successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('brand.manage')->with($notification);

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
        $brand = Brand::find($id);

        if (!is_null($brand)){
            if (File::exists('backend/img/brands/' . $brand->image)){
                File::delete('backend/img/brands/' . $brand->image);
            }
            $brand->delete();
        }

        
        $notification = array(
            'message' => 'Brand deleted successfully',
            'alert-type' => 'error'
        );


        return redirect()->route('brand.manage')->with($notification);
    }
}
