<?php include "includes/header.php";
include "includes/navigation.php";
// include "includes/../includes/db.php";
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

                    <div class="col-md-8 m-auto">
                        <!-- adding posts form -->
                        <form method="POST" enctype="multipart/form-data" action="">
                            <?php
                            //get info that should be update

                            if (isset($_GET['update_post'])) {
                                $update_post_id = $_GET['update_post'];

                                $get_update_query = "Select * from posts where post_id = '$update_post_id'";
                                $get_update_result = mysqli_query($connection, $get_update_query);

                                while ($updt = mysqli_fetch_assoc($get_update_result)) {
                            ?>

                                    <div class="form-group">
                                        <label for="">Post Title</label>
                                        <input value="<?php echo $updt['post_title']; ?>" type="text" class="form-control" name="p_title">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Post Category ID</label>
                                        <!-- <input type="text" class="form-control"  value="<?php echo $updt['post_category_id']; ?>"> -->
                                        <select class="form-control" name="p_category_id">

                                            <?php
                                            $get_category = "select * from category";
                                            $get_category_result = mysqli_query($connection, $get_category);
                                            while ($gc = mysqli_fetch_assoc($get_category_result)) {
                                            ?>
                                                <option value="<?php echo $gc['cat_id']; ?>"><?php echo $gc['cat_title'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Post Author</label>
                                        <input type="text" class="form-control" name="p_author" value="<?php echo $updt['post_author']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Post Status</label>
                                        <input type="text" class="form-control" name="p_status" value="<?php echo $updt['post_status']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Post Image</label>
                                        <input type="file" class="form-control" name="p_image">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Post Tags</label>
                                        <input type="text" class="form-control" name="p_tags" value="<?php echo $updt['post_tags']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Post Date</label>
                                        <input type="Date" class="form-control" name="p_date" value="<?php echo $updt['post_date']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Post Content</label>
                                        <textarea type="text" class="form-control" name="p_content"><?php echo $updt['post_content']; ?></textarea>
                                    </div>
                            <?php }
                            } ?>
                            <button class="btn btn-primary" type="submit" name="updt_post_btn">
                                Add Post
                            </button>
                        </form>
                    </div>
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



    <?php

    if (isset($_POST['updt_post_btn'])) {
        $update_post_id = $_GET['update_post'];
        $title = $_POST['p_title'];
        $cat_id = $_POST['p_category_id'];
        $author = $_POST['p_author'];
        $status = $_POST['p_status'];

        $image_name = $_FILES['p_image']['name'];
        $image_tmp_name = $_FILES['p_image']['tmp_name'];

        $tags = $_POST['p_tags'];
        $date = $_POST['p_date'];
        $content = $_POST['p_content'];

        move_uploaded_file($image_tmp_name, '../images/' . $image_name);
        $update_post_query = "UPDATE `posts` SET `post_category_id`='$cat_id',`post_title`='$title',`post_image`='$image_name',`post_author`='$author',`post_date`='$date',`post_content`='$content',`post_tags`='$tags',`post_status`='$status' WHERE post_id = '$update_post_id'";
        $update_post_result = mysqli_query($connection, $update_post_query);




        //     move_uploaded_file($image_tmp_name, '../images/'.$image_name);
        //     $post_insert_query = "INSERT INTO `posts`(`post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`,  `post_status`) VALUES
        //      ('$cat_id','$title','$author','$date','$image_name','$content','$tags','$status')";
        //     $post_insert_result = mysqli_query($connection, $post_insert_query);

    }



    ?>