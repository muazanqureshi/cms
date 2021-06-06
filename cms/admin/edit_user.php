<?php include "includes/header.php";

// edit users function
$object->edit_user();
?>
        <!-- navigation bar -->
        
<!-- page -->

<div class="jumbotron bg-light py-1 container">
<form class="form" method="POST" enctype="multipart/form-data">
	<div class="row">
	<h2 class="text-center">Edit User</h2>
	<?php  
	foreach($object->get_edit_user_details() as $user) {
	
		?>
	<div class="from-group py-2 col-md-6 col-sm-12">
		<label>Username</label>
		<input value="<?php echo $user['user_name'];?>" type="text" class="form-control" name="uname">
	</div>
	<div class="from-group py-2 col-md-6 col-sm-12">
		<label>User Email</label>
		<input value="<?php echo $user['user_email'];?>" type="text" class="form-control" name="uemail">
	</div>
	<div class="from-group py-2 col-md-6 col-sm-12">
		<label>UserFirstname</label>
		<input value="<?php echo $user['user_firstname'];?>" type="text" class="form-control" name="ufname">
	</div>
	<div class="from-group py-2 col-md-6 col-sm-12">
		<label>User Lastname</label>
		<input value="<?php echo $user['user_lastname'];?>" type="text" class="form-control" name="ulname">
	</div>
	<div class="from-group py-2 col-md-6 col-sm-12">
		<label>Password</label>
		<input value="<?php echo $user['user_password'];?>" type="Password" class="form-control" name="upassword">
	</div>
	<div class="from-group py-2 col-md-6 col-sm-12">
		<label>User Image</label>
		<input required type="file" class="form-control" name="uimage">
	</div>
	<div class="from-group py-2 col-md-6 col-sm-12">
		<label>User Date of Birth</label>
		<input required value="<?php echo $user['user_dob'];?>" type="date" class="form-control" name="udob">
	</div>
	<div class="from-group py-2 col-md-6 col-sm-12">
		<label>User Role</label>
		<select required class="form-control" name="urole">
			<option disabled selected>Select Role</option>
			<option value="admin">Admin</option>
			<option value="subscriber">Subscriber</option>
		</select>
	</div>
<?php }?>
	<div class="from-group py-2 p-2">
	<button class="btn btn-dark w-100" type="submit" name="edit_user_btn">
		Add User
	</button>
	</div>
	</div>
</form>
<?php var_dump($object->get_edit_user_details()); ?>

</div>




<!-- end page -->
<!-- footer  -->
<?php  include "includes/footer.php";?>