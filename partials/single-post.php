
<?php
include "header.php"; 



// izbrisi jedan od ova dva upita ,prvi i prilagodi ostale


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

<main role="main" class="container">
    <div class="row">
        <div class="col-sm-8 blog-main">
            <div class="blog-post">

<h2 class="blog-post-title"><?php echo($singlePost['Title']) ?></h2>
<p class="blog-post-meta"><?php echo($singlePost['Created_at']) ?>  by <a href="#"><?php echo($singlePost['Author']) ?></a></p>
<p><?php echo($singlePost['Body']) ?></p>

<button type="button" class="btn btn-default btn-comments">Hide comments</button>




<?php
                $com_id = $_GET['Post_id'];

                $sql = "SELECT * FROM posts INNER JOIN comments ON posts.Id = comments.Post_id where posts.Id = ".$com_id;
               
                $com = $connection->prepare($sql);
                $com->execute();
                $com->setFetchMode(PDO::FETCH_ASSOC);
                $comments = $com->fetchAll();
                foreach ($comments as $comment) { ?>
                <!-- added div with comment-info-->
                <div class="comment-info">
                    <hr>
                    <ul >
                        <li><p><h6><i>Comment: </i></h6><?php echo($comment['Text']) ?></p></li>
                        <li><h6><i>Author by </i><?php echo($comment['Author']) ?></h6></li>
                    </ul>
                   
                <?php } ?>



                <hr>
                 </div>
            </div><!-- /.blog-post -->
            <nav class="blog-pagination">
                <a class="btn btn-outline-primary" href="#">Older</a>
                <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
            </nav>
        </div><!-- /.row -->
        <?php include "sidebar.php"; ?>
    </div><!-- /.blog-main -->
</main><!-- /.container -->
  <?php include "footer.php"; ?>