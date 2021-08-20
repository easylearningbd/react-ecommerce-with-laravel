<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductReview;

class ReviewController extends Controller
{
    public function ReviewList(Request $request){

        $id = $request->id;
        $result = ProductReview::where('product_id',$id)->orderBy('id','desc')->limit(4)->get();
        return $result;
    } // End Method 



    public function PostReview(Request $request){

        $product_name = $request->input('product_name');
        $product_code = $request->input('product_code');
        $user_name = $request->input('reviewer_name');
        $reviewer_photo = $request->input('reviewer_photo');
        $reviewer_rating = $request->input('reviewer_rating');
        $reviewer_comments = $request->input('reviewer_comments');
         
         $result = ProductReview::insert([
            'product_name' => $product_name,
            'product_code' => $product_code,
            'reviewer_name' => $user_name,
            'reviewer_photo' => $reviewer_photo,
            'reviewer_rating' => $reviewer_rating,
            'reviewer_comments' => $reviewer_comments,

         ]);
         return $result;

    } // End Method 


    


} 
 