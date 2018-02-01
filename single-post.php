
<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">
    <link rel="stylesheet" type="text/css" href="styles/style.css">

    <title>Vivify Blog</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="styles/blog.css" rel="stylesheet">
</head>

<body>

<?php include 'header.php';?>

<main role="main" class="container">

    <div class="row">

        <div class="col-sm-8 blog-main">

            <?php
    // ako su mysql username/password i ime baze na vasim racunarima drugaciji
    // obavezno ih ovde zamenite
    $servername = "127.0.0.1";
    $username = "root";
    $password = "vivify";
    $dbname = "blog";

    try {
        $connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
        // pripremamo upit
        $sql = "SELECT Id, Title, Body, Author, Created_at FROM posts ORDER BY Created_at DESC LIMIT 3";
        $statement = $connection->prepare($sql);
                
        // izvrsavamo upit
        $statement->execute();
                
        // zelimo da se rezultat vrati kao asocijativni niz.
        // ukoliko izostavimo ovu liniju, vratice nam se obican, numerisan niz
        $statement->setFetchMode(PDO::FETCH_ASSOC);
                
        // punimo promenjivu sa rezultatom upita
        $posts = $statement->fetchAll();
                
        // koristite var_dump kada god treba da proverite sadrzaj neke promenjive
       

?>
 <?php
                foreach ($posts as $post) {
            ?>
             <div class="blog-post">

               <h2 class="blog-post-title"><a href="/posts1.php"><?php echo($post['Title']) ?></a></h2>
                <p class="blog-post-meta"><?php echo($post['Created_at']) ?> by <a href="#"><?php echo($post['Author']) ?></a></p>

               <p><?php echo($post['Body']) ?></p>
  </div><!-- /.blog-post -->


           <?php
                }
            ?>
        </div>

<?php include 'sidebar.php' ?>
</div>
</main>


<?php include 'footer.php';?>

</body>
</html>


  
  


