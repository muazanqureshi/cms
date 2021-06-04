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

                    <!-- TABLE TO SHOW ALL COMMENTS -->
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Author</th>
                                <th>Comment</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>In Response to</th>
                                <th>Date</th>
                                <th>Approve</th>
                                <th>Unapprove</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $fetch_comment_query = "Select * from comments";
                            $fetch_comment_result = mysqli_query($connection, $fetch_comment_query);
                            foreach ($fetch_comment_result as $comment) {
                                $comment_post_id = $comment['comment_post_id'];
                            ?>

                                <tr>
                                    <td><?php echo $comment['comment_id'] ?></td>
                                    <td><?php echo $comment['comment_author'] ?></td>
                                    <td><?php echo $comment['comment_content'] ?></td>
                                    <td><?php echo $comment['comment_email'] ?></td>
                                    <td><?php echo $comment['comment_status'] ?></td>
                                    <td><?php //echo $comment['comment_post_id'] 

                                        //relating post and comments
                                        $p_c_query = "select * from posts where post_id = '$comment_post_id'";
                                        $p_c_result = mysqli_query($connection, $p_c_query);
                                        while ($pc = mysqli_fetch_assoc($p_c_result)) {
                                            echo $pc['post_title'];
                                        }

                                        ?></td>
                                    <td><?php echo $comment['comment_date'] ?></td>
                                    <td><a href="all_comments.php?approve_comment=<?php echo $comment['comment_id']; ?>">Approve</a></td>
                                    <td><a href="all_comments.php?unapprove_comment=<?php echo $comment['comment_id']; ?>">Unapprove</a></td>
                                    <td><a href="#">Update</a></td>
                                    <td><a href="all_comments.php?delete_comment=<?php echo $comment['comment_id']; ?>">Delete</a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>



                </div>
            </div>
        </div>
    </div>
</div>

<?php
include "includes/footer.php";
?>

<?php
// deleting comments
if (isset($_GET['delete_comment'])) {
    $cmnt_id = $_GET['delete_comment'];
    // echo $cmnt_id;
    $del_comment = "delete from comments where comment_id = '$cmnt_id'";
    $del_comment_result = mysqli_query($connection, $del_comment);
    echo "<script>window.location.href='all_comments.php'</script>";
    // header("Location:all_comments.php");
}

// changing comment status
//unapprove comments

if (isset($_GET['unapprove_comment'])) {
    $unapp = $_GET['unapprove_comment'];
    $unapp_query = "UPDATE `comments` SET `comment_status`='unapprove' WHERE comment_id = '$unapp'";
    $unapp_query_result = mysqli_query($connection, $unapp_query);
    echo "<script>window.location.href='all_comments.php'</script>";
}


//approve comments

if (isset($_GET['approve_comment'])) {
    $app = $_GET['approve_comment'];
    $app_query = "UPDATE `comments` SET `comment_status`='approve' WHERE comment_id = '$app'";
    $app_query_result = mysqli_query($connection, $app_query);
    echo "<script>window.location.href='all_comments.php'</script>";
}
?>