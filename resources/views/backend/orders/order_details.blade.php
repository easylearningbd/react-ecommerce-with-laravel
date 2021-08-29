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
  <li class="list-group-item">An item</li>
  <li class="list-group-item">A second item</li>
  <li class="list-group-item">A third item</li>
  <li class="list-group-item">A fourth item</li>
  <li class="list-group-item">And a fifth one</li>
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
  <li class="list-group-item">An item</li>
  <li class="list-group-item">A second item</li>
  <li class="list-group-item">A third item</li>
  <li class="list-group-item">A fourth item</li>
  <li class="list-group-item">And a fifth one</li>
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