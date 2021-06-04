<?php include "includes/header.php";
include "includes/db.php";
include "includes/navigation.php"; ?>


<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">
            <!-- 
            <h1 class="page-header">
                Daily Posts
                <small>Technology News</small>
            </h1> -->

            <!-- First Blog Post -->
            <?php
            if (isset($_GET['post_id'])) {
                $pid = $_GET['post_id'];
                $query = "Select * from posts where post_id = '$pid'";
                $result = mysqli_query($connection, $query);

                while ($posts = mysqli_fetch_assoc($result)) {

                    //                    echo $posts['post_title'];

            ?>
                    <h2>
                        <a href="#"><?php echo $posts['post_title']; ?></a>
                    </h2>
                    <p class="lead">
                        by <a href="#"><?php echo $posts['post_author']; ?></a>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $posts['post_date']; ?> at 10:00 PM</p>
                    <hr>
                    <img class="img-responsive" src="images/<?php echo $posts['post_image'] ?>" alt="">
                    <hr>
                    <p><?php echo $posts['post_content']; ?></p>
                    <!-- <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a> -->

                    <hr>
                    <!-- Comments Form -->
                    <div class="well">

                        <h4>Leave a Comment:</h4>
                        <form action="" method="post" role="form">

                            <div class="form-group">
                                <label for="Author">Author</label>
                                <input type="text" name="comment_author" class="form-control" name="comment_author">
                            </div>
                            <div class="form-group">
                                <label for="Author">Email</label>
                                <input type="email" name="comment_email" class="form-control" name="comment_email">
                            </div>
                            <div class="form-group">
                                <label for="comment">Your Comment</label>
                                <textarea name="comment_content" class="form-control" rows="3"></textarea>
                            </div>
                            <button type="submit" name="create_comment_btn" class="btn btn-primary">Submit</button>
                        </form>
                    </div>

            <?php }
            } ?>
            <hr>
            <!-- showing post comments -->
            <?php
            //approved comments on post
            if (isset($_GET['post_id'])) {
                $pp_id = $_GET['post_id'];
                $post_cmnt_query = "Select * from comments where comment_status = 'approve' and comment_post_id = '$pp_id'";
                $post_cmnt_query_result = mysqli_query($connection, $post_cmnt_query);
                while ($cmnts = mysqli_fetch_assoc($post_cmnt_query_result)) {
            ?>
                    <div class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object" src="http://placehold.it/64x64" alt="">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading"><?php echo $cmnts['comment_author'];   ?>
                                <small><?php echo $cmnts['comment_date'];  ?></small>
                            </h4>

                            <?php echo $cmnts['comment_content'];  ?>

                        </div>
                    </div>
            <?php }
            } ?>





            <!-- Pager in bottom of page -->
            <!-- <ul class="pager">
                <li class="previous">
                    <a href="#">&larr; Older</a>
                </li>
                <li class="next">
                    <a href="#">Newer &rarr;</a>
                </li>
            </ul> -->

        </div>
        <!--sidebar page exist here-->
        <?php include "includes/sidebar.php"; ?>
    </div>

</div>
<!-- /.row -->

<hr>
<?php include "includes/footer.php"; ?>


<!-- inserting comment to database -->

<?php
if (isset($_POST['create_comment_btn'])) {
    $post_id = $_GET['post_id'];
    $author = $_POST['comment_author'];
    $email = $_POST['comment_email'];
    $content = $_POST['comment_content'];

    $insert_comment_query = "INSERT INTO `comments`(`comment_post_id`, `comment_author`, `comment_email`, `comment_content`) VALUES 
    ('$post_id','$author','$email','$content')";
    $insert_comment_result = mysqli_query($connection, $insert_comment_query);
}


?>