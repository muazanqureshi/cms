            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <form method="post" action="search.php">
                        <div class="input-group">
                            <input name="search" type="text" class="form-control">
                            <span class="input-group-btn">
                                <button name="search_btn" class="btn btn-default" type="submit">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>
                            </span>
                        </div>
                    </form>
                    <!-- /.input-group -->
                </div>

                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <?php

                                $query = "Select * from category";
                                $select_all_category = mysqli_query($connection, $query);

                                while ($row = mysqli_fetch_assoc($select_all_category)) {
                                    echo "<li><a href=''>" . $row['cat_title'] . "</a></li>";
                                }
                                ?>
                                <!--
                               
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
-->
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                        <!--
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                            </ul>
                        </div>
-->
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>
                <div class="login-form well">
                    <form action="../login.php" method="post">
                        <h2 class="text-center">Log in</h2>
                        <div class="form-group">
                            <input name="username" type="text" class="form-control" placeholder="Username" required="required">
                        </div>
                        <div class="form-group">
                            <input name="password" type="password" class="form-control" placeholder="Password" required="required">
                        </div>
                        <div class="form-group">
                            <button type="submit" name="login_btn" class="btn btn-primary btn-block">Log in</button>
                        </div>
                        <!-- <div class="clearfix"> -->
                        <!-- <label class="pull-left checkbox-inline"><input type="checkbox"> Remember me</label> -->
                        <!-- <a href="#" class="pull-right">Forgot Password?</a> -->
                        <!-- </div> -->
                    </form>
                    <!-- <p class="text-center"><a href="#">Create an Account</a></p> -->
                </div>
                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>