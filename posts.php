    <div class="row">

        <div class="col-sm-8 blog-main">

            <?php 
            
            $sql = "SELECT Id, Title, Body, Author, Created_at FROM posts ORDER BY Created_at DESC LIMIT 3";
            $statement = $connection->prepare($sql);
                
            $statement->execute();
                
            $statement->setFetchMode(PDO::FETCH_ASSOC);
                
            $posts = $statement->fetchAll();
                       
            ?>
            
            <?php
            foreach ($posts as $post) {
            ?>
                <div class="blog-post">

                    <h2 class="blog-post-title"><a href="single-post.php?post_id=<?php echo($post['Id']) ?>"><?php echo($post['Title']) ?></a></h2>

                    <p class="blog-post-meta"><?php echo($post['Created_at']) ?> by <a href="#"><?php echo($post['Author']) ?></a></p>

                    <p><?php echo($post['Body']) ?></p>
                </div><!-- /.blog-post -->


            <?php
                }
            ?>
        </div>
    </div>




  
  


