<?php
$name = $_POST["name"];

$commentId=$_POST["commentId"];
$comment = $_POST["comment"];
$postId = $_GET["Post_id"];


 include 'connection.php';





// pripremamo upit
                $sql = "INSERT INTO comments(Id, Author, Text, Post_id) VALUES ($commentId, $name, $comment, $postId);";

                // echo $sql;
                $statement = $connection->prepare($sql);
                // izvrsavamo upit
                $statement->execute();

header("single-post.php");


?>