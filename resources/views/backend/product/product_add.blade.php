@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-wrapper">
			<div class="page-content">

				<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
	<div class="breadcrumb-title pe-3">eCommerce</div>
	<div class="ps-3">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb mb-0 p-0">
				<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">Add New Product</li>
			</ol>
		</nav>
	</div>
	<div class="ms-auto">
		<div class="btn-group">
			<button type="button" class="btn btn-primary">Settings</button>
			<button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
			</button>
			<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;">Action</a>
				<a class="dropdown-item" href="javascript:;">Another action</a>
				<a class="dropdown-item" href="javascript:;">Something else here</a>
				<div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Separated link</a>
			</div>
		</div>
	</div>
</div>
<!--end breadcrumb-->

<div class="card">
  <div class="card-body p-4">
	  <h5 class="card-title">Add New Product</h5>
	  <hr>
       <div class="form-body mt-4">
	    <div class="row">
		   <div class="col-lg-8">
           <div class="border border-3 p-4 rounded">
			<div class="mb-3">
				<label for="inputProductTitle" class="form-label">Product Title</label>
				<input type="email" class="form-control" id="inputProductTitle" placeholder="Enter product title">
			  </div>
			  <div class="mb-3">
				<label for="inputProductDescription" class="form-label">Description</label>
				<textarea class="form-control" id="inputProductDescription" rows="3"></textarea>
			  </div>
			  <div class="mb-3">
				<label for="inputProductDescription" class="form-label">Product Images</label>
				<input id="image-uploadify" type="file" accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf" multiple="" style="display: none;"><div class="imageuploadify well"><div class="imageuploadify-overlay"><i class="fa fa-picture-o"></i></div><div class="imageuploadify-images-list text-center"><i class="bx bxs-cloud-upload"></i><span class="imageuploadify-message">Drag&amp;Drop Your File(s)Here To Upload</span><button type="button" class="btn btn-default">or select file to upload</button></div></div>
			  </div>
            </div>
		   </div>
		   <div class="col-lg-4">
			<div class="border border-3 p-4 rounded">
              <div class="row g-3">
				<div class="col-md-6">
					<label for="inputPrice" class="form-label">Price</label>
					<input type="email" class="form-control" id="inputPrice" placeholder="00.00">
				  </div>
				  <div class="col-md-6">
					<label for="inputCompareatprice" class="form-label">Compare at Price</label>
					<input type="password" class="form-control" id="inputCompareatprice" placeholder="00.00">
				  </div>
				  <div class="col-md-6">
					<label for="inputCostPerPrice" class="form-label">Cost Per Price</label>
					<input type="email" class="form-control" id="inputCostPerPrice" placeholder="00.00">
				  </div>
				  <div class="col-md-6">
					<label for="inputStarPoints" class="form-label">Star Points</label>
					<input type="password" class="form-control" id="inputStarPoints" placeholder="00.00">
				  </div>
				  <div class="col-12">
					<label for="inputProductType" class="form-label">Product Type</label>
					<select class="form-select" id="inputProductType">
						<option></option>
						<option value="1">One</option>
						<option value="2">Two</option>
						<option value="3">Three</option>
					  </select>
				  </div>
				  <div class="col-12">
					<label for="inputVendor" class="form-label">Vendor</label>
					<select class="form-select" id="inputVendor">
						<option></option>
						<option value="1">One</option>
						<option value="2">Two</option>
						<option value="3">Three</option>
					  </select>
				  </div>
				  <div class="col-12">
					<label for="inputCollection" class="form-label">Collection</label>
					<select class="form-select" id="inputCollection">
						<option></option>
						<option value="1">One</option>
						<option value="2">Two</option>
						<option value="3">Three</option>
					  </select>
				  </div>
				  <div class="col-12">
					<label for="inputProductTags" class="form-label">Product Tags</label>
					<input type="text" class="form-control" id="inputProductTags" placeholder="Enter Product Tags">
				  </div>
				  <div class="col-12">
					  <div class="d-grid">
                         <button type="button" class="btn btn-primary">Save Product</button>
					  </div>
				  </div>
			  </div> 
		  </div>
		  </div>
					   </div><!--end row-->
					</div>
				  </div>
			  </div>

			</div>
		</div>
 




<script type="text/javascript">
	$(document).ready(function(){
		$('#image').change(function(e){
			var reader = new FileReader();
			reader.onload = function(e){
				$('#showImage').attr('src',e.target.result);
			}
			reader.readAsDataURL(e.target.files['0']);

		});
	});	
</script>







@endsection