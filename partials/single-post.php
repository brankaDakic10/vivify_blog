<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
      integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
<link rel="icon" type="image/png" href="images/images.png"/>
<link href="styles/blog.css" rel="stylesheet">
<link rel="stylesheet" href="styles/styles.css">
<title>Blog</title>
<?php
include "header.php"; ?>
<main role="main" class="container">
    <div class="row">
        <div class="col-sm-8 blog-main">
            <div class="blog-post">


<?php



 include 'connection.php';

    if (isset($_GET['Post_id'])) {

        $postId = $_GET['Post_id'];

        // pripremamo upit
        $sql = "SELECT Id, Title, Body, Author, Created_at FROM posts WHERE Id = {$postId}";
        // var_dump($sql);

        $statement = $connection->prepare($sql);

        // izvrsavamo upit
        $statement->execute();

        // zelimo da se rezultat vrati kao asocijativni niz.
        // ukoliko izostavimo ovu liniju, vratice nam se obican, numerisan niz
        $statement->setFetchMode(PDO::FETCH_ASSOC);

        // punimo promenjivu sa rezultatom upita
        $singlePost = $statement->fetch();

        // koristite var_dump kada god treba da proverite sadrzaj neke promenjive
                   // echo '<pre>';
                   // var_dump($singlePost);
                   // echo '</pre>';
    }

?>


<h2 class="blog-post-title"><a href="single-post.php"><?php echo($singlePost['Title']) ?></a></h2>
<p class="blog-post-meta"><?php echo($singlePost['Created_at']) ?>  by <a href="#"><?php echo($singlePost['Author']) ?></a></p>
<p><?php echo($singlePost['Body']) ?></p>



<?php
                $com_id = $_GET['Post_id'];


                $sql = "SELECT * FROM comments  INNER JOIN posts ON comments.Post_id = posts.Id where comments.Post_id = ".$com_id;
                $com = $connection->prepare($sql);
                $com->execute();
                $com->setFetchMode(PDO::FETCH_ASSOC);
                $comments = $com->fetchAll();
                foreach ($comments as $comment) { ?>
                    <hr>
                    <ul>
                        <li><p><h6><i>Comment: </i></h6><?php echo($comment['Text']) ?></p></li>
                        <li><h6><i>Author by </i><?php echo($comment['Author']) ?></h6></li>
                    </ul>
                <?php } ?>



                <hr>
            </div><!-- /.blog-post -->
            <nav class="blog-pagination">
                <a class="btn btn-outline-primary" href="#">Older</a>
                <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
            </nav>
        </div><!-- /.row -->
        <?php include "sidebar.php"; ?>
    </div><!-- /.blog-main -->
</main><!-- /.container -->
