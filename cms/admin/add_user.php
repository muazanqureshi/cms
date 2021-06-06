<?php include "includes/header.php";

// add users function
$object->add_user();
?>
        <!-- navigation bar -->
        
<!-- page -->

<div class="jumbotron bg-light py-1 container">
<form class="form" method="POST" enctype="multipart/form-data">
	<div class="row">
	<h2 class="text-center">Add User</h2>
	<div class="from-group py-2 col-md-6 col-sm-12">
		<label>Username</label>
		<input type="text" class="form-control" name="uname">
	</div>
	<div class="from-group py-2 col-md-6 col-sm-12">
		<label>User Email</label>
		<input type="text" class="form-control" name="uemail">
	</div>
	<div class="from-group py-2 col-md-6 col-sm-12">
		<label>UserFirstname</label>
		<input type="text" class="form-control" name="ufname">
	</div>
	<div class="from-group py-2 col-md-6 col-sm-12">
		<label>User Lastname</label>
		<input type="text" class="form-control" name="ulname">
	</div>
	<div class="from-group py-2 col-md-6 col-sm-12">
		<label>Password</label>
		<input type="Password" class="form-control" name="upassword">
	</div>
	<div class="from-group py-2 col-md-6 col-sm-12">
		<label>User Image</label>
		<input type="file" class="form-control" name="uimage">
	</div>
	<div class="from-group py-2 col-md-6 col-sm-12">
		<label>User Date of Birth</label>
		<input type="date" class="form-control" name="udob">
	</div>
	<div class="from-group py-2 col-md-6 col-sm-12">
		<label>User Role</label>
		<select class="form-control" name="urole">
			<option disabled selected>Select Role</option>
			<option value="admin">Admin</option>
			<option value="subscriber">Subscriber</option>
		</select>
	</div>
	<div class="from-group py-2 p-2">
	<button class="btn btn-dark w-100" type="submit" name="add_user_btn">
		Add User
	</button>
	</div>
	</div>
</form>

</div>




<!-- end page -->
<!-- footer  -->
<?php  include "includes/footer.php";?>