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
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i> <a href="index.html">Dashboard</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-file"></i> Blank Page
                        </li>
                    </ol>

                    <!-- table start here -->

                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Tags</th>
                                <th>Images</th>
                                <th>Comment</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $fetch_query = "Select * from POSTS";
                            $fetch_result = mysqli_query($connection, $fetch_query);

                            foreach ($fetch_result as $post) {
                            ?>

                                <tr>
                                    <td><?php echo $post['post_id']; ?></td>
                                    <td><?php echo $post['post_title']; ?></td>
                                    <td><?php echo $post['post_author']; ?></td>
                                    <td><?php echo $post['post_category_id']; ?></td>
                                    <td><?php echo $post['post_status']; ?></td>
                                    <td><?php echo $post['post_tags']; ?></td>
                                    <td><?php echo $post['post_image']; ?></td>
                                    <td><?php echo $post['post_comments_count']; ?></td>
                                    <td><?php echo $post['post_date']; ?></td>
                                    <td><a href="post.php?delete_post=<?php echo $post['post_id'] ?>"><span class="glyphicon glyphicon-remove"></span></a></td>
                                    <td><a href="update_post.php?update_post=<?php echo $post['post_id'] ?>"><span class="glyphicon glyphicon-edit"></span></a></td>
                                </tr>
                            <?php   } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->


    <?php
    include "includes/footer.php";
    ?>


    <!-- deleting a post -->
    <?php

    if (isset($_GET['delete_post'])) {
        $del_id = $_GET['delete_post'];
        $del_post_query = "DELETE FROM `posts` WHERE post_id = '$del_id'";
        $del_post_result = mysqli_query($connection, $del_post_query);
        echo "<script>window.location.href='post.php'</script>";
    }
    ?>