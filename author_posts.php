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

                if(isset($_GET['p_id']))
                {
                    $the_post_id = $_GET['p_id'];
                    $the_post_author = $_GET['author'];
                }

                $query = "SELECT * FROM posts WHERE post_author = '{$the_post_author}' " ;
                $select_all_posts_query = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($select_all_posts_query))
                {
                    $post_title = $row['post_title'];
                    //echo "<li> <a href='#'> </a></li>";
                    $post_author = $row['post_author'];
                    $post_date = strtotime($row['post_date']); //working
                    // $query = "SELECT date_format(post_date,'%d/%m/%Y') as DateFormat from posts ";
                    // $convert_date = mysqli_query($connection, $query);
                    // echo $post_date2 = $convert_date; Not needed causes error
                    
                    $post_image = $row['post_image'];
                    $post_content = $row['post_content'];
                    ?>

                <h1 class="page-header">
                    Blog Content
                    <small> </small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $post_title; ?></a>
                </h2>
                <p class="lead">
                    by <?php echo $post_author; ?>
                </p>

                <!-- Date in d/m/y -->
                <p><span class="glyphicon glyphicon-time"></span><?php echo date('d/F/Y', $post_date); ?></p>
                <hr>

                <img class="img-responsive" src="/cms/images/<?php echo $post_image; ?>" alt="">
                <hr>
                <p><?php echo $post_content; ?></p>
                
                <hr>
               <?php
                }
                ?>
               


            


            </div>
            <!-- Blog Sidebar Widgets Column will be included-->
            <?php include "includes/sidebar.php";  ?>

        </div>
        <!-- /.row -->

        <hr>

        <?php include "includes/footer.php";  ?>