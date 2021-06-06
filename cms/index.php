<?php include "includes/header.php";?>
        <!-- Responsive navbar-->
        <?php include "includes/navigation.php";?>
        <!-- Page content-->
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Post content-->
                    <article>
                        <!-- Post header-->
                        <header class="mb-4">
                            <!-- Post title-->
                            <h1 class="fw-bolder mb-1"><a class="text-decoration-none text-dark" href="#">Welcome to Blog Post!</a></h1>
                            <!-- Post meta content-->
                            <div class="text-muted fst-italic mb-2">Posted on January 1, 2021 by Start Bootstrap</div>
                            <!-- Post categories-->
                            <a class="badge bg-secondary text-decoration-none link-light" href="#!">Web Design</a>
                            <a class="badge bg-secondary text-decoration-none link-light" href="#!">Freebies</a>
                        </header>
                        <!-- Preview image figure-->
                        <figure class="mb-4"><img class="img-fluid rounded" src="https://dummyimage.com/900x400/ced4da/6c757d.jpg" alt="..." /></figure>
                        <!-- Post content-->
                        <section class="mb-5">
                            <p class="fs-5 mb-4">Science is an enterprise that should be cherished as an activity of the free human mind. Because it transforms who we are, how we live, and it gives us an understanding of our place in the universe.</p>
                            <button class="btn btn-dark">
                                Read More
                            </button>
                        </section>
                    </article>
                    <!-- Comments section-->
                    
                </div>
                <!-- sidebar -->
                <?php include "includes/sidebar.php";?>
            </div>
        </div>
     <?php include "includes/footer.php";?>