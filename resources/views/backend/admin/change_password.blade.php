@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
	<div class="breadcrumb-title pe-3">User Change Password</div>
	<div class="ps-3">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb mb-0 p-0">
				<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">Change Password</li>
			</ol>
		</nav>
	</div>
 





</div>



<!--end breadcrumb-->
<div class="container">
	<div class="main-body">
		<div class="row"> 

			<div class="col-lg-12">



<form method="post" action="{{ route('change.password.update') }}" > 
	 @csrf


	 @foreach ($errors->all() as $error)
	 	<p class="text-danger"> {{ $error }}  </p>
	 @endforeach

				<div class="card">
					<div class="card-body">
						<div class="row mb-3">


	<div class="col-sm-3">
		<h6 class="mb-0">Current Password </h6>
	</div>
	<div class="col-sm-9 text-secondary">
		<input type="password" name="oldpassword" class="form-control" id="current_password" >
	</div>
</div>



<div class="row mb-3">
	<div class="col-sm-3">
		<h6 class="mb-0">New Password </h6>
	</div>
	<div class="col-sm-9 text-secondary">
		<input type="password" name="password" id="password" class="form-control" >
	</div>
</div>
 

 <div class="row mb-3">
	<div class="col-sm-3">
		<h6 class="mb-0">Confirm Password </h6>
	</div>
	<div class="col-sm-9 text-secondary">
		<input type="password" name="password_confirmation" id="password_confirmation" class="form-control" >
	</div>
</div>
 
 


 
<div class="row">
	<div class="col-sm-3"></div>
	<div class="col-sm-9 text-secondary">
		<input type="submit" class="btn btn-primary px-4" value="Change Password">
	</div>
</div>
					</div>
				</div>


</form>
				 
 



							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

 


@endsection