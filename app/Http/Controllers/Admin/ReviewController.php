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


}
 