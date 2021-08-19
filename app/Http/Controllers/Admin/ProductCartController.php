<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductCart;
use App\Models\ProductList;
use App\Models\CartOrder;

class ProductCartController extends Controller
{
    public function addToCart(Request $request){
        $email = $request->input('email');
        $size = $request->input('size');
        $color = $request->input('color');
        $quantity = $request->input('quantity');
        $product_code = $request->input('product_code');

        $productDetails = ProductList::where('product_code',$product_code)->get();

        $price = $productDetails[0]['price'];
        $special_price = $productDetails[0]['special_price'];

        if($special_price=="na"){
            $total_price = $price*$quantity;
            $unit_price = $price;
        }
        else{
            $total_price = $special_price*$quantity;
            $unit_price = $special_price;
        }

        $result = ProductCart::insert([

            'email' => $email,
            'image' => $productDetails[0]['image'],
            'product_name' => $productDetails[0]['title'],
            'product_code' => $productDetails[0]['product_code'],
            'size' => "Size: ".$size,
            'color' => "Color: ".$color,
            'quantity' => $quantity,
            'unit_price' => $unit_price,
            'total_price' => $total_price, 

        ]);

        return $result;
    } // End Method 



    public function CartCount(Request $request){
        $product_code = $request->product_code;
        $result = ProductCart::count();
        return $result;
    } // End Method 


    public function CartList(Request $request){

        $email = $request->email;
        $result = ProductCart::where('email',$email)->get();
        return $result;

    } // End Method 


    public function RemoveCartList(Request $request){

        $id = $request->id;
        $result = ProductCart::where('id',$id)->delete();
        return $result;

    }// End Method 


    public function CartItemPlus(Request $request){
         $id = $request->id;
         $quantity = $request->quantity;
         $price = $request->price;
         $newQuantity = $quantity+1;
         $total_price = $newQuantity*$price;
         $result = ProductCart::where('id',$id)->update(['quantity' =>$newQuantity, 'total_price' => $total_price ]);

         return $result;

    }// End Method 

        public function CartItemMinus(Request $request){
         $id = $request->id;
         $quantity = $request->quantity;
         $price = $request->price;
         $newQuantity = $quantity-1;
         $total_price = $newQuantity*$price;
         $result = ProductCart::where('id',$id)->update(['quantity' =>$newQuantity, 'total_price' => $total_price ]);

         return $result;

    }// End Method 



    public function CartOrder(){
        
    }// End Method 


}
 