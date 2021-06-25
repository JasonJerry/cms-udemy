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


$per_page = 5;


            if(isset($_GET['page'])){

               

              $page = $_GET['page'];
            }
            else{

                $page = "";
            }            

            if($page == "" || $page ==1)
            {
                $page_1 = 0;

            }else{
                $page_1 = ($page * $per_page) - $per_page;
                
            }

            if($_SESSION['user_role'] == 'Admin'){
                $post_query_count = "SELECT * FROM posts";

                // echo "ss";
                // die();

            }
            else{
                $post_query_count = "SELECT * FROM posts WHERE post_status = 'Published' ";
                
            }



                
                $find_count = mysqli_query($connection, $post_query_count);
                $count = mysqli_num_rows($find_count);

                if($count < 1){


                    echo "NO POSTS";
                }
               else{
                $count = ceil($count / $per_page);
               

            






                $query = "SELECT * FROM posts LIMIT $page_1, $per_page";
                $select_all_posts_query = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($select_all_posts_query))
                {
                    $post_title = $row['post_title'];
                    //echo "<li> <a href='#'> </a></li>";
                    $post_id = $row['post_id'];
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = strtotime($row['post_date']);
                    $post_image = $row['post_image'];
                    $post_content = substr($row['post_content'],0,250); 
                    $post_status = $row['post_status'];

                   
                    //    if($post_status !== "Published"){

                    //    }
                    //    else{
                      
                    
                    
                    
                    ?>

                <h1 class="page-header">
                    Blog Posts
                    <small></small>
                </h1>

                <!-- First Blog Post -->




                <h2>
                    <a href="post/<?php echo $post_id; ?>"><?php echo $post_title; ?></a>
                </h2>
                <p class="lead">
                    by <a href="author_posts.php?author=<?php echo $post_author; ?>&p_id=<?php echo $post_id; ?>"><?php echo $post_author; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span><?php echo date('d/m/y',$post_date); ?></p>
                <hr>
                <a href="/cms/post/<?php echo $post_id; ?>">
                <img class="img-responsive" src="/cms/images/<?php echo $post_image; ?>"  alt="">
                </a>
                <hr>
                <p><?php echo $post_content; ?></p>
                 
                <a class="btn btn-primary" href="/cms/post/<?php echo $post_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
               <?php
                 } }
                ?>
               
            </div>
            <!-- Blog Sidebar Widgets Column will be included-->
            <?php include "includes/sidebar.php";  ?>

        </div>
        <!-- /.row -->

        


      
    </div>  

        <ul class="pager">
        <?php
        for($i=1; $i <= $count; $i++){
            if($i == $page){

                echo "<li><a class='active_link' href='index.php?page={$i}'>{$i}</a></li>";
            }else{

            echo "<li><a href='index.php?page={$i}'>{$i}</a></li>";
        }}
        
?>
        </ul>

        <?php include "includes/footer.php";  ?>