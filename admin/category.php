<?php include "includes/header.php";


//adding categories to database via add category form
if (isset($_POST['cat_button'])) {
    $cat_name = $_POST['cat_title'];

    $query = "INSERT INTO `category`(`cat_title`) VALUES ('$cat_name')";
    $result = mysqli_query($connection, $query);

    if (!$query) {
        echo "<script>alert('Some Went Wrong')</script>";
    } else {
        echo "<script>alert('Category Added Successfully')</script>";
        echo "<script>window.location.href='category.php'</script>";
    }
}

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
                    <div class="container-fluid">
                        <div class="col-md-6">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="">Add Category</label>
                                    <input type="text" class="form-control" required placeholder="Enter your Category Title" name="cat_title">
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary" name="cat_button" type="submit">
                                        Add Category
                                    </button>
                                </div>
                            </form>
                            <hr>
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="">Update Category</label>

                                    <?php
                                    //edit or updating category code here
                                    if (isset($_GET['edit'])) {
                                        $edit_category = $_GET['edit'];

                                        $update_query = "select * from category where cat_id = '$edit_category'";
                                        $update_result = mysqli_query($connection, $update_query);

                                        while ($update_row = mysqli_fetch_assoc($update_result)) {
                                            $update_categ_name = $update_row['cat_title'];

                                    ?>

                                            <input type="text" class="form-control" name="update_cat_title" value="<?php if (isset($_GET['edit'])) {
                                                                                                                        echo $update_categ_name;
                                                                                                                    } ?>">

                                    <?php }
                                    } ?>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary" name="update_cat_button" type="submit">
                                        Update Category
                                    </button>
                                </div>
                            </form>



                            <?php
                            if (isset($_POST['update_cat_button'])) {
                                $updt_cat_id = $_GET['edit'];
                                $updt_cat_title = $_POST['update_cat_title'];
                                $updt_query = "UPDATE `category` SET `cat_title`='$updt_cat_title' WHERE cat_id = '$updt_cat_id'";
                                $updt_result = mysqli_query($connection, $updt_query);
                                // echo "<script>window.location.href='category.php'</script>";
                            }







                            ?>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-hover">
                                <tr>
                                    <th>
                                        Category ID
                                    </th>
                                    <th>
                                        Category Name
                                    </th>
                                </tr>
                                <?php
                                $fetch_query = "SELECT * FROM `category`";
                                $resultt = mysqli_query($connection, $fetch_query);
                                //                                    
                                foreach ($resultt as $rows) {

                                ?>
                                    <tr>
                                        <td><?php echo $rows['cat_id'] ?></td>
                                        <td><?php echo $rows['cat_title'] ?></td>
                                        <td><a href="category.php?delete=<?php echo $rows['cat_id'] ?>"><span class="glyphicon glyphicon-remove"></span></a></td>
                                        <td><a href="category.php?edit=<?php echo $rows['cat_id'] ?>"><span class="glyphicon glyphicon-edit"></span></a></td>
                                    </tr>
                                <?php
                                }

                                ?>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<?php include "includes/footer.php"; ?>




<!--for deleting a category-->
<?php

if (isset($_GET['delete'])) {
    $delete_category = $_GET['delete'];
    $delete_query = "Delete from category where cat_id = '$delete_category'";
    $delete_result = mysqli_query($connection, $delete_query);
    echo "<script>window.location.href='category.php'</script>";
}

?>