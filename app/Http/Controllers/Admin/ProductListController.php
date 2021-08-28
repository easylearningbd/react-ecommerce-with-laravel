<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductList;
use App\Models\Category;
use App\Models\Subcategory;
use Image;
 
class ProductListController extends Controller
{
    public function ProductListByRemark(Request $request){

        $remark = $request->remark;
        $productlist = ProductList::where('remark',$remark)->limit(8)->get();
        return $productlist;

    } // End Method 

    public function ProductListByCategory(Request $request){

        $Category = $request->category;
        $productlist = ProductList::where('category',$Category)->get();
        return $productlist;

    }// End Method 


    public function ProductListBySubCategory(Request $request){

        $Category = $request->category;
        $SubCategory = $request->subcategory;
        $productlist = ProductList::where('category',$Category)->where('subcategory',$SubCategory)->get();

        return $productlist;

    }// End Method 



    public function ProductBySearch(Request $request){

        $key = $request->key;
        $productlist = ProductList::where('title','LIKE',"%{$key}%")->orWhere('brand','LIKE',"%{$key}%")->get();
        return $productlist;

    }// End Method 


    public function SimilarProduct(Request $request){
        $subcategory = $request->subcategory;
        $productlist = ProductList::where('subcategory',$subcategory)->orderBy('id','desc')->limit(6)->get();
        return $productlist;

    }// End Method 



    public function GetAllProduct(){

        $products = ProductList::latest()->paginate(10);
        return view('backend.product.product_all',compact('products'));

    } // End Method 


    public function AddProduct(){

        $category = Category::orderBy('category_name','ASC')->get();
        $subcategory = Subcategory::orderBy('subcategory_name','ASC')->get();
        return view('backend.product.product_add',compact('category','subcategory'));

    } // End Method 


    public function StoreProduct(Request $request){

         $request->validate([
            'product_code' => 'required',
        ],[
            'product_code.required' => 'Input Product Code'

        ]);

        $image = $request->file('image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(711,960)->save('upload/product/'.$name_gen);
        $save_url = 'http://127.0.0.1:8000/upload/product/'.$name_gen;

        $product_id = ProductList::insertGetId([
            'title' => $request->title,
            'price' => $request->price,
            'special_price' => $request->special_price,
            'category' => $request->category,
            'subcategory' => $request->subcategory,
            'remark' => $request->remark,
            'brand' => $request->brand,
            'product_code' => $request->product_code,
            'image' => $save_url, 

        ]);

        /////// Insert Into Product Details Table ////// 


    } // End Method 


}
