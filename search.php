<?php  include "includes/db.php"; ?>
 <?php  include "includes/header.php"; ?>


    <!-- Navigation -->
    
    <?php  include "includes/navigation.php"; ?>
    
 
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            
            <div class="col-md-8">
               
               <?php

             

            if(isset($_POST['submit']))
            {
                
                $search = $_POST['search'];
                    
                    
                if(isset($_SESSION['username']) && $_SESSION['user_role'] == 'Admin')
                {
                    $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' ";
                }
                else
                {
                    $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' AND post_status = 'Published'";
                }
                $search_query = mysqli_query($connection, $query);

                if(!$search_query) {

                    die("QUERY FAILED" . mysqli_error($connection));

                }

                $count = mysqli_num_rows($search_query);

                if($count == 0) {

                    echo "<h1> NO RESULT</h1>";

                } else 
                {

                    while($row = mysqli_fetch_assoc($search_query)) 
                    {
                        $post_title = $row['post_title'];
                        $post_author = $row['post_author'];
                        $post_date = strtotime($row['post_date']); //working
                        $post_image = $row['post_image'];
                        $post_content = $row['post_content'];

                        ?>

                        <h1 class="page-header">
                            Blog Content
                            <small> </small>
                        </h1>

                        <!-- First Blog Post -->
                        <h2>
                            <a href="#"><?php echo $post_title ?></a>
                        </h2>
                        <p class="lead">
                            by <a href="index.php"><?php echo $post_author ?></a>
                        </p>
                        <!-- Date in d/m/y -->
                        <p><span class="glyphicon glyphicon-time"></span><?php echo date('d/F/Y', $post_date); ?></p>
                        <hr>
                        <img class="img-responsive" src="/cms/images/<?php echo $post_image;?>" alt="">
                        <hr>
                        <p><?php echo $post_content ?></p>
                        <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                        <hr>
                    <?php }
                }         
            }

?>
            </div>
                <!-- Blog Sidebar Widgets Column -->
            
            
            <?php include "includes/sidebar.php";?>
             

        </div>
        <!-- /.row -->

        <hr>
<?php include "includes/footer.php";?>
