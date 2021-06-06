<?php include "includes/header.php";
$object->delete_user();

?>
     

<div class="container">
	<h3 class="">All User Details</h3>
	<table class="table table-hover table-bordered">
		<thead>
			<tr>
				<th>ID</th>
				<th>Role</th>
				<th>Username</th>
				<th>Firstname</th>
				<th>Lastname</th>
				<th>Email</th>
				<th>Password</th>
				<th>Date of Birth</th>
				<th>Image</th>
				<th>Create at</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			foreach($object->get_users() as $user) {
			?>
			<tr>
				<td><?php echo $user['user_id'];?></td>
				<td><?php echo $user['user_role'];?></td>
				<td><?php echo $user['user_name'];?></td>
				<td><?php echo $user['user_firstname'];?></td>
				<td><?php echo $user['user_lastname'];?></td>
				<td><?php echo $user['user_email'];?></td>
				<td><?php echo $user['user_password'];?></td>
				<td><?php echo $user['user_dob'];?></td>
				<td><img style="height: 50px" src="../images/users/<?php echo $user['user_image'];?>"<?php echo $user['user_image'];?>></td>
				<td><?php echo $user['user_create_dt'];?></td>
				<td><a href="edit_user.php?edit_user=<?php echo $user['user_id'];?>"><i class="far fa-edit"></i></a></td>
				<td><a href="all_users.php?delete_user=<?php echo $user['user_id'];?>"><i class="fas fa-trash-alt"></i></a></td>
			</tr>
		<?php } ?>
		</tbody>
	</table>
</div>

<!-- footer  -->
<?php include "includes/footer.php";?>