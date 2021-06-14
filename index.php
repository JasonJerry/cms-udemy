<?php include "includes/header.php";  ?>
<?php include "includes/db.php";  ?>
    <!-- Navigation will be kept here from include -->
    <?php include "includes/navigation.php";  ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
            <?php 

                $query = "SELECT * FROM posts where post_status = 'Published' " ;
                $select_all_posts_query = mysqli_query($connection, $query);
                $rows = mysqli_num_rows($select_all_posts_query);
                
                if ($rows > 0)
                {
                while ($row = mysqli_fetch_assoc($select_all_posts_query))
                {
                    $post_title = $row['post_title'];
                    //echo "<li> <a href='#'> </a></li>";
                    $post_id = $row['post_id'];
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = strtotime($row['post_date']); //working
                    $post_image = $row['post_image'];
                    $post_content = substr($row['post_content'],0,250); 


                    $post_status = $row['post_status'];
                    
                    
                    
                        
                    
                                       
                    ?>

                            <h1 class="page-header">
                                Blog Content
                                <small> </small>
                            </h1>

                            <!-- First Blog Post -->
                            <h2>
                                <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a>
                            </h2>
                            <p class="lead">
                                by <a href="index.php"><?php echo $post_author; ?></a>
                            </p>
                             <!-- Date in d/m/y -->
                            <p><span class="glyphicon glyphicon-time"></span><?php echo date('d/m/Y', $post_date); ?></p>
                            <hr>


                            <a href="post.php?p_id=<?php echo $post_id; ?>">
                            <img class="img-responsive" src="images/<?php echo $post_image; ?>"  alt="">
                            </a>
                            <hr>
                            <p><?php echo $post_content; ?></p>
                            <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                            <hr>
                        <?php
                }  }

                else
                {
                    echo "<h1>No Posts at the moment!</h1>";
                }
                ?>
               
            </div>
            <!-- Blog Sidebar Widgets Column will be included-->
            <?php include "includes/sidebar.php";  ?>

        </div>
        <!-- /.row -->

        <hr>

        <?php include "includes/footer.php";  ?>