<?php 


 include 'connection.php';


if (isset($_GET['Post_id'])) { 
    $linkInSidebar = 'single-post.php';
} else {
    $linkInSidebar = 'partials/single-post.php';
}

 $sql = "SELECT Id, Title, Body, Author, Created_at FROM posts ORDER BY Created_at DESC LIMIT 5";
                $statement = $connection->prepare($sql);
                // izvrsavamo upit
                $statement->execute();
                // zelimo da se rezultat vrati kao asocijativni niz.
                // ukoliko izostavimo ovu liniju, vratice nam se obican, numerisan niz
                $statement->setFetchMode(PDO::FETCH_ASSOC);
                // punimo promenjivu sa rezultatom upita
                $posts = $statement->fetchAll();
                // koristite var_dump kada god treba da proverite sadrzaj neke promenjive
                    // echo '<pre>';
                    // var_dump($posts);
                    // echo '</pre>';
           
?>

        <aside class="col-sm-3 ml-sm-auto blog-sidebar">
           <div class="sidebar-module sidebar-module-inset">
               <h4>Latest posts</h4>
               <?php foreach ($posts as $post) { ?>
              <!--  <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p> -->
               <h5><a href="<?php echo ($linkInSidebar.'?Post_id='.$post['Id']) ?>"><?php echo($post['Title']);?></a></h5>
               <?php } ?>
           </div>
           <!--  <div class="sidebar-module">
                <h4>Archives</h4>
                <ol class="list-unstyled">
                    <li><a href="#">March 2014</a></li>
                    <li><a href="#">February 2014</a></li>
                    <li><a href="#">January 2014</a></li>
                    <li><a href="#">December 2013</a></li>
                    <li><a href="#">November 2013</a></li>
                    <li><a href="#">October 2013</a></li>
                    <li><a href="#">September 2013</a></li>
                    <li><a href="#">August 2013</a></li>
                    <li><a href="#">July 2013</a></li>
                    <li><a href="#">June 2013</a></li>
                    <li><a href="#">May 2013</a></li>
                    <li><a href="#">April 2013</a></li>
                </ol>
            </div>
            <div class="sidebar-module">
                <h4>Elsewhere</h4>
                <ol class="list-unstyled">
                    <li><a href="#">GitHub</a></li>
                    <li><a href="#">Twitter</a></li>
                    <li><a href="#">Facebook</a></li>
                </ol>
            </div> -->
        </aside><!-- /.blog-sidebar -->
        