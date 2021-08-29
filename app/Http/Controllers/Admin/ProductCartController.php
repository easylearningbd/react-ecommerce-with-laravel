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



    public function CartOrder(Request $request){

        $city = $request->input('city');
        $paymentMethod = $request->input('payment_method');
        $yourName = $request->input('name');
        $email = $request->input('email');
        $DeliveryAddress = $request->input('delivery_address');
        $invoice_no = $request->input('invoice_no');
        $DeliveryCharge = $request->input('delivery_charge');

        date_default_timezone_set("Asia/Dhaka");
        $request_time = date("h:i:sa");
        $request_date = date("d-m-Y");

        $CartList = ProductCart::where('email',$email)->get();

        foreach($CartList as $CartListItem){
            $cartInsertDeleteResult = "";

            $resultInsert = CartOrder::insert([
                'invoice_no' => "Easy".$invoice_no,
                'product_name' => $CartListItem['product_name'],
                'product_code' => $CartListItem['product_code'],
                'size' => $CartListItem['size'],
                'color' => $CartListItem['color'],
                'quantity' => $CartListItem['quantity'],
                'unit_price' => $CartListItem['unit_price'],
                'total_price' => $CartListItem['total_price'],
                'email' => $CartListItem['email'],
                'name' => $yourName,
                'payment_method' => $paymentMethod,
                'delivery_address' => $DeliveryAddress,
                'city' => $city,
                'delivery_charge' => $DeliveryCharge,
                'order_date' => $request_date,
                'order_time' => $request_time,
                'order_status' => "Pending",
            ]);

            if ($resultInsert==1) {
               $resultDelete = ProductCart::where('id',$CartListItem['id'])->delete();
               if ($resultDelete==1) {
                   $cartInsertDeleteResult=1;
               }else{
                   $cartInsertDeleteResult=0;
               }
            }

        }
            return $cartInsertDeleteResult;

    }// End Method 



    public function OrderListByUser(Request $request){
        $email = $request->email;
        $result = CartOrder::where('email',$email)->orderBy('id','DESC')->get();
        return $result;

    }// End Method 


    ///////////////// Order Process From Backend ////////////////


    public function PendingOrder(){

        $orders = CartOrder::where('order_status','Pending')->orderBy('id','DESC')->get();
        return view('backend.orders.pending_orders',compact('orders'));

    } // End Method 


        public function ProcessingOrder(){

        $orders = CartOrder::where('order_status','Processing')->orderBy('id','DESC')->get();
        return view('backend.orders.processing_orders',compact('orders'));

    } // End Method 


        public function CompleteOrder(){

        $orders = CartOrder::where('order_status','Complete')->orderBy('id','DESC')->get();
        return view('backend.orders.complete_orders',compact('orders'));

    } // End Method 


    public function OrderDetails($id){

        $order = CartOrder::findOrFail($id);
        return view('backend.orders.order_details',compact('order'));


    } // End Method 

 
    public function PendingToProcessing($id){

    CartOrder::findOrFail($id)->update(['order_status' => 'Processing']);

     $notification = array(
            'message' => 'Order Processing Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('pending.order')->with($notification);

    } // End Method 


        public function ProcessingToComplete($id){

    CartOrder::findOrFail($id)->update(['order_status' => 'Complete']);

     $notification = array(
            'message' => 'Order Complete Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('processing.order')->with($notification);

    } // End Method 



}
 