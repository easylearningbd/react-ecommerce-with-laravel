@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
	<div class="breadcrumb-title pe-3">Order Details </div>
	<div class="ps-3">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb mb-0 p-0">
				<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">Invoice : <strong> <span class="text-danger"> {{ $order->invoice_no }} </span> </strong> </li>
			</ol>
		</nav>
	</div>
 
 
</div>



<!--end breadcrumb-->
<div class="container">
	<div class="main-body">
		<div class="row">
			<div class="col-lg-6">
				<div class="card">
					<div class="card-body">

						<ul class="list-group">
  <li class="list-group-item"><strong> <span class="text-dark"> Product Name : </span> </strong> {{ $order->product_name }} </li>

  <li class="list-group-item"><strong> <span class="text-dark"> Product Code : </span> </strong> {{ $order->product_code }} </li>

  <li class="list-group-item"><strong> <span class="text-dark"> Product Size : </span> </strong> {{ $order->size }} </li>

  <li class="list-group-item"><strong> <span class="text-dark"> Product Color : </span> </strong> {{ $order->color }} </li>

  <li class="list-group-item"><strong> <span class="text-dark"> Product Quantity : </span> </strong> {{ $order->quantity }} </li>

  <li class="list-group-item"><strong> <span class="text-dark"> Unit Price : </span> </strong> {{ $order->unit_price }} </li>

  <li class="list-group-item"><strong> <span class="text-dark"> Total Price : </span> </strong> {{ $order->total_price }} </li>

  <li class="list-group-item"><strong> <span class="text-dark"> User Email : </span> </strong> {{ $order->email }} </li>

  <li class="list-group-item"><strong> <span class="text-dark"> User Name : </span> </strong> {{ $order->name }} </li>



  
</ul>
						 
				</div>
			</div>

			</div>


	 

			<div class="col-lg-6"> 
<form method="post" action="{{ route('user.profile.store') }}" enctype="multipart/form-data"> 
	 @csrf



				<div class="card">
					<div class="card-body">

<ul class="list-group">

<li class="list-group-item"><strong> <span class="text-dark"> Payment Method : </span> </strong> {{ $order->payment_method }} </li>

  <li class="list-group-item"><strong> <span class="text-dark"> Delivery Address : </span> </strong> {{ $order->delivery_address }} </li>

  <li class="list-group-item"><strong> <span class="text-dark"> City : </span> </strong> {{ $order->city }} </li>

  <li class="list-group-item"><strong> <span class="text-dark"> Delivery Charge : </span> </strong> {{ $order->delivery_charge }} </li>

  <li class="list-group-item"><strong> <span class="text-dark"> Order Date : </span> </strong> {{ $order->order_date }} </li>

  <li class="list-group-item"><strong> <span class="text-dark"> Order Time : </span> </strong> {{ $order->order_time }} </li>

    <li class="list-group-item"><strong> <span class="text-dark"> Order Status  : </span> </strong> 

   <span class="badge badge-pill" style="background: #FF0000;">{{ $order->order_status }}</span> 
    	 </li>

<br>

	@if($order->order_status == 'Pending')
	<a href="{{ route('pending.processing',$order->id) }}" class="btn btn-block btn-success"> Processing Order</a>

	@elseif($order->order_status == 'Processing')
    <a href="{{ route('processing.complete',$order->id) }}" class="btn btn-block btn-success"> Complete Order</a>
 	@endif

</ul>
						 
				</div> 
				</form> 
 



							</div>
						</div>
					</div>
				</div>
			</div>
		</div>


 


@endsection