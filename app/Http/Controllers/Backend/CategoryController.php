<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::orderBy('title','asc')->where('is_parent',0)->get();
        return view('backend.pages.category.manage',['categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $parents = Category::orderBy('title','asc')->where('is_parent',0)->get();
        return view('backend.pages.category.create',['parents'=>$parents]);
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
        $category = new Category();
        $category->title = $request->title;
        $category->slug = Str::slug($request->title);
        $category->description = $request->description;
        $category->is_parent = $request->is_parent;
        $category->status = $request->status;

        if ($request->image){
            $image = $request->file('image');
            $img = time().'.'.$image->getClientOriginalExtension();
            $path = public_path('backend/img/categories/'. $img);
            Image::make($image)->save($path);
            $category->image = $img;
        }

        $category->save();

        
        $notification = array(
            'message' => 'Category created successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('category.manage')->with($notification);
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
        $category = Category::find($id);
        $parents = Category::orderBy('title','asc')->where('is_parent',0)->get();
        return view('backend.pages.category.edit',[
            'category'=>$category,
            'parents'=>$parents
            ]);
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
        $category = Category::find($id);
        $category->title = $request->title;
        $category->slug = Str::slug($request->title);
        $category->description = $request->description;
        $category->is_parent = $request->is_parent;
        $category->status = $request->status;


        if ($request->image){

            if (File::exists('backend/img/categories/' . $category->image)){
                File::delete('backend/img/categories/' . $category->image);
            }

            $image = $request->file('image');
            $img = time().'.'.$image->getClientOriginalExtension();
            $path = public_path('backend/img/categories/'. $img);
            Image::make($image)->save($path);
            $category->image = $img;
        }

        $category->save();
        
        $notification = array(
            'message' => 'Category updated successfully!',
            'alert-type' => 'info'
        );
        return redirect()->route('category.manage')->with($notification);
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
        $category = Category::find($id);

        if (!is_null($category)){
            if (File::exists('backend/img/categories/' . $category->image)){
                File::delete('backend/img/categories/' . $category->image);
            }
            $category->delete();
          
        }

      
        $notification = array(
            'message' => 'Category deleted successfully!',
            'alert-type' => 'error'
        );
        return redirect()->route('category.manage')->with($notification);
    }
}
