<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use Image;

class CategoryController extends Controller
{
    public function AllCategory(){

        $categories = Category::all();
        $categoryDetailsArray = [];

        foreach ($categories as $value) {
            $subcategory = Subcategory::where('category_name',$value['category_name'])->get();

            $item = [
                'category_name' => $value['category_name'],
                'category_image' => $value['category_image'],
                'subcategory_name' => $subcategory
            ];

            array_push($categoryDetailsArray, $item);

        } 
        return $categoryDetailsArray;

    } // End Mehtod 



    public function GetAllCategory(){

        $category = Category::latest()->get();
        return view('backend.category.category_view',compact('category'));

    } // End Mehtod 


    public function AddCategory(){
      return view('backend.category.category_add');
    } // End Mehtod 


    public function StoreCategory(Request $request){

        $request->validate([
            'category_name' => 'required',
        ],[
            'category_name.required' => 'Input Category Name'

        ]);

        $image = $request->file('category_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(128,128)->save('upload/category/'.$name_gen);
        $save_url = 'http://127.0.0.1:8000/upload/category/'.$name_gen;

        Category::insert([
            'category_name' => $request->category_name,
            'category_image' => $save_url,
        ]);

        $notification = array(
            'message' => 'Category Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.category')->with($notification);

    }// End Mehtod 


    public function EditCategory($id){

        $category = Category::findOrFail($id);
        return view('backend.category.category_edit',compact('category'));

    } //End Method 


    public function UpdateCategory(Request $request){


    } //End Method 


    
}
