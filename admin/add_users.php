<?php include "includes/header.php";
include "includes/navigation.php";
include "../includes/db.php";

?>


<div id="wrapper">


    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome to Admin Panel
                        <small></small>
                    </h1>

                    <!-- adding users form -->
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group col-md-6">
                            <label for="">First Name</label>
                            <input type="text" name="user_firstname" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Last Name</label>
                            <input type="text" name="user_lastname" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Username</label>
                            <input type="text" name="user_name" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">User Email</label>
                            <input type="text" name="user_email" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Password</label>
                            <input type="text" name="user_password" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">User Role</label>
                            <select name="user_role" id="" class="form-control">
                                <option selected disabled>Select Options</option>
                                <option value="admin">Admin</option>
                                <option value="subscriber">Subscriber</option>
                            </select>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="">User Image</label>
                            <input type="file" name="user_image" class="form-control">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit" name="add_user_btn">
                                Add User
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "includes/footer.php"; ?>


<?php
// adding users to database
if (isset($_POST['add_user_btn'])) {
    $ufname = $_POST['user_firstname'];
    $ulname = $_POST['user_lastname'];
    $uname = $_POST['user_name'];
    $uemail = $_POST['user_email'];
    $upass = $_POST['user_password'];
    $urole = $_POST['user_role'];

    $uimage = $_FILES['user_image']['name'];
    $utmp_name = $_FILES['user_image']['tmp_name'];

    move_uploaded_file($utmp_name, "../images" . $uimage);
    $add_user_query = "INSERT INTO `users`( `user_name`, `user_email`, `user_password`, `user_firstname`, `user_lastname`, `user_image`, `user_role`)
                         VALUES ('$uname','$uemail','$upass','$ufname','$ulname','$uemail','$uimage')";
    $add_user_result = mysqli_query($connection, $add_user_query);
}




?>