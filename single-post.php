             
<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Vivify Blog</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="styles/blog.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="styles/style.css">

</head>

<body>

<?php include 'header.php';?>

<main role="main" class="container">

    <div class="row">

        <div class="col-sm-8 blog-main">

            <div class="blog-post">
                
                             <?php
                include "db.php";
                $post_id = $_GET['post_id'];
                $sql = "SELECT posts.Id, posts.Title, posts.Body, posts.Author, posts.Created_at, comments.ID, comments.Author as Author_comment, comments.Text, comments.Post_id FROM posts INNER JOIN comments ON posts.Id = comments.Post_id WHERE posts.id = 1;";



                $statement = $connection->prepare($sql);
                $statement->execute();
                $statement->setFetchMode(PDO::FETCH_ASSOC);
                $singlePost = $statement->fetch();
                // var_dump($singlePost);
                ?>


                <h2 class="blog-post-title"><a href="single-post.php?post_id=<?php echo($singlePost['Id']) ?>"><?php echo($singlePost['Title']) ?></a></h2>

                <p class="blog-post-meta"><?php echo($singlePost['Created_at']) ?> by <a href="#"><?php echo($singlePost['Author']) ?></a></p>

                <p><?php echo($singlePost['Body']) ?></p>

                <button id=button class="btn" onclick="myFunction()">Hide comments</button>
                
                <div id="comments">


                    <p class="blog-post-meta"><?php echo('comments') ?> by <a href="#"><?php echo($singlePost['Author_comment']) ?></a></p>

                    <p><?php echo($singlePost['Text']) ?></p>

                    <script src="script.js"></script>

                </div>
           
        </div>
            <nav class="blog-pagination">
                <a class="btn btn-outline-primary" href="#">Older</a>
                <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
            </nav>
            
            </div><!-- /.blog-post -->

            

            

            

            <?php include 'sidebar.php' ?>

        </div><!-- /.blog-main -->

    

    </div><!-- /.row -->

</main><!-- /.container -->

<?php include 'footer.php';?>
<script src="script.js"></script>
</body>
</html>