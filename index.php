<?php include "includes/header.php";
include "includes/db.php";
include "includes/navigation.php"; ?>


<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <h1 class="page-header">
                Daily Posts
                <small>Technology News</small>
            </h1>

            <!-- First Blog Post -->
            <?php
            $query = "Select * from posts";
            $result = mysqli_query($connection, $query);

            while ($posts = mysqli_fetch_assoc($result)) {

                //                    echo $posts['post_title'];

            ?>
                <h2>
                    <a href="post.php?post_id=<?php echo $posts['post_id']; ?>"><?php echo $posts['post_title']; ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $posts['post_author']; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $posts['post_date']; ?> at 10:00 PM</p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $posts['post_image'] ?>" alt="">
                <hr>
                <p><?php echo $posts['post_content']; ?></p>
                <a class="btn btn-primary" href="post.php?post_id=<?php echo $posts['post_id']; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
            <?php } ?>


            <!-- Pager -->
            <ul class="pager">
                <li class="previous">
                    <a href="#">&larr; Older</a>
                </li>
                <li class="next">
                    <a href="#">Newer &rarr;</a>
                </li>
            </ul>

        </div>
        <!--sidebar page exist here-->
        <?php include "includes/sidebar.php"; ?>
    </div>

</div>
<!-- /.row -->

<hr>

<?php

include "includes/footer.php"; ?>