<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductReview;

class ReviewController extends Controller
{
    public function ReviewList(Request $request){

        $product_code = $request->product_code;
        $result = ProductReview::where('product_code',$product_code)->orderBy('id','desc')->limit(4)->get();
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


    public function GetAllReview(){

         $review = ProductReview::latest()->get();
        return view('backend.review.review_all', compact('review'));
    }// End Method 


} 
 