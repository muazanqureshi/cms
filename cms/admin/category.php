<?php include "includes/header.php";
//adding category
$object->add_category();

//deleting category
$object->delete_category();
?>
        <!-- navigation bar -->
<div class="container">
	<h3>All About Category</h3>
	<div class="row">
		<div class="col-12 col-md-6">
			<form method="post">
				<div class="form-group col-10 py-2">
					<label>Add Category</label>
					<input type="text" name="category" class="form-control">
				</div>
				<div class="form-group py-2">
					<button class="btn btn-dark" name="add_category_btn" type="submit">
						Add Category
					</button>
				</div>
			</form>
		</div>
		<div class="col-12 col-md-6">
			<table class="table table-hover table-bordered">
				<thead>
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Edit</th>
						<th>Delete</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					foreach ($object->get_category() as $cat) {
					?>
					<tr>
						<td><?php echo $cat['category_id'];?></td>
						<td><?php echo $cat['category_name'];?></td>
						<td><a href="category.php?edit_category=<?php echo $cat['category_id'];?>"><i class="far fa-edit"></i></a></td>
						<td><a href="category.php?delete_category=<?php echo $cat['category_id'];?>"><i class="fas fa-trash-alt"></i></a></td>
					</tr>
				<?php }?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<!-- footer  -->
<?php include "includes/footer.php";?>