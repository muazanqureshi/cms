<?php session_start();

class CMS{

function connection(){
	$connect = mysqli_connect('localhost','root','','cms');
	return $connect;
}//connection end here

function add_user(){
	if(isset($_POST['add_user_btn']))
	{
		$uname = $_POST['uname'];
		$uemail = $_POST['uemail'];
		$ufname = $_POST['ufname'];
		$ulname = $_POST['ulname'];
		$upassword = $_POST['upassword'];
		$uimg = $_FILES['uimage']['name'];
		$uimg_tmp = $_FILES['uimage']['tmp_name'];
		$udob = $_POST['udob'];
		$urole = $_POST['urole'];

		move_uploaded_file($uimg_tmp, "../images/users/".$uimg);
		$add_user_query = "INSERT INTO `users`(`user_name`, `user_firstname`, `user_lastname`, `user_email`, `user_password`, `user_image`, `user_dob`, `user_role`) VALUES ('$uname','$ufname','$ulname','$uemail','$upassword','$uimg','$udob','$urole')";
		$add_user_result = mysqli_query($this->connection(),$add_user_query);

		if(!$add_user_result){
			die("Query Failed". mysqli_error($this->connection()));
		}
		else
		{
			echo "<script>alert('User Added Successfully')</script>";
		}
	}
}//add user function end here

function get_users()
{
	$query = "select * from users";
	$result = mysqli_query($this->connection(), $query);
	return $result;
}//get users function end here

function delete_user(){
	if(isset($_GET['delete_user'])){
		$delete_id = $_GET['delete_user'];
		$query = "delete from users where user_id = '$delete_id'";
		$result = mysqli_query($this->connection(), $query);
		echo "<script>window.location.href='all_users.php'</script>";
	}
}//delete user function end here

function get_edit_user_details(){
	if(isset($_GET['edit_user'])){
		$edit_id = $_GET['edit_user'];
		$query = "SELECT * FROM `users` WHERE user_id = '$edit_id'";
		$result = mysqli_query($this->connection(), $query);
		return $result;
	}
}//get_edit_user_details function end here

function edit_user(){
	if(isset($_POST['edit_user_btn']))
	{
		$edit_id = $_GET['edit_user'];
		$uname = $_POST['uname'];
		$uemail = $_POST['uemail'];
		$ufname = $_POST['ufname'];
		$ulname = $_POST['ulname'];
		$upassword = $_POST['upassword'];
		$uimg = $_FILES['uimage']['name'];
		$uimg_tmp = $_FILES['uimage']['tmp_name'];
		$udob = $_POST['udob'];
		$urole = $_POST['urole'];

		move_uploaded_file($uimg_tmp, "../images/users/".$uimg);
		$add_user_query = "UPDATE `users` SET `user_name`='$uname',`user_firstname`='$ufname',`user_lastname`='$ulname',`user_email`='$uemail',`user_password`='$upassword',`user_image`='$uimg',`user_dob`='$udob',`user_role`='$urole' WHERE user_id = '$edit_id'";
		$add_user_result = mysqli_query($this->connection(),$add_user_query);

		if(!$add_user_result){
			die("Query Failed". mysqli_error($this->connection()));
		}
		else
		{
			echo "<script>alert('User Edited Successfully')</script>";
			echo "<script>window.location.href='all_users.php'</script>";
		}
	}
}//edit user function end here

function add_category()
{
	if(isset($_POST['add_category_btn']))
	{
		$cat_name = $_POST['category'];

		$query = "INSERT INTO `category`(`category_name`) VALUES ('$cat_name')";
		$result = mysqli_query($this->connection(), $query);
	}
}//add category function end here

function get_category(){
	$query = "select * from category";
	$result = mysqli_query($this->connection(), $query);
	return $result;
}//get category function end here

function delete_category(){
	if(isset($_GET['delete_category'])){
		$del_cat = $_GET['delete_category'];
		$query = "delete from category where category_id = '$del_cat'";
		$result = mysqli_query($this->connection(), $query);
		echo "<script>window.location.href='category.php'</script>";
	}
}//function for delete category

//
//
//
function login()
{
	if(isset($_POST['login_btn']))
	{
		$email = $_POST['login_email'];
		$password = $_POST['login_password'];

		$query = "select * from users where user_email = '$email' and user_password = '$password'";
		$result = mysqli_query($this->connection(), $query);

		$count = mysqli_num_rows($result);
		if($count == 1)
		{
			$_SESSION['logged_in'] =  $_POST['login_email'];
			echo "<script>window.location.href='index.php'</script>";
		}
		else{
			$log_error = "Login Creditentials are Incorrect";
		}
	}
}
//
//
//

}// class end here

// object
$object = new CMS;

?>