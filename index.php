<?php include 'partials/header.php';?>
<body>

<!-- header -->

<main role="main" class="container">

    <div class="row">

        <div class="col-sm-8 blog-main">
            <!-- /.blog-post -->
<?php include 'partials/posts.php';?>
           <!-- /.blog-post -->

            <nav class="blog-pagination">
                <a class="btn btn-outline-primary" href="#">Older</a>
                <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
            </nav>

        </div><!-- /.blog-main -->
        <?php include 'partials/sidebar.php';?>
<!-- /.blog-sidebar -->

    </div><!-- /.row -->

</main><!-- /.container -->
<?php include 'partials/footer.php';?>

