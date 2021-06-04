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
                    <!-- all users table -->
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <td>Id</td>
                                <td>Username</td>
                                <td>First Name</td>
                                <td>Last Name</td>
                                <td>Email</td>
                                <td>Role</td>
                                <td>Date</td>
                                <td>Edit</td>
                                <td>Delete</td>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- all user info from database -->
                            <?php

                            $get_users_query = "SELECT * FROM `users`";
                            $get_users_result = mysqli_query($connection, $get_users_query);

                            foreach ($get_users_result as $user) {
                            ?>
                                <tr>
                                    <td><?php echo $user['user_id']; ?></td>
                                    <td><?php echo $user['user_name']; ?></td>
                                    <td><?php echo $user['user_firstname']; ?></td>
                                    <td><?php echo $user['user_lastname']; ?></td>
                                    <td><?php echo $user['user_email']; ?></td>
                                    <td><?php echo $user['user_role']; ?></td>
                                    <td><?php echo $user['user_date']; ?></td>
                                    <td><a href="all_users.php?update_user=<?php echo $user['user_id']; ?>">Edit</a></td>
                                    <td><a href="all_users.php?delete_user=<?php echo $user['user_id']; ?>">Delete</a></td>
                                </tr>
                            <?php  } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "includes/footer.php"; ?>

<?php
//deleting users
if (isset($_POST['delete_user'])) {
    $del_user_id = $_POST['delete_user'];
    $del_user_query = "delete from users where user_id = '$del_user_id'";
    $del_user_result = mysqli_query($connection, $del_user_query);
    echo "<script>window.location.href='all_users.php'</script>";
}


?>