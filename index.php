<?php include "includes/header.php";  ?>
<?php include "includes/db.php";  ?>
    <!-- Navigation will be kept here from include -->
    <?php include "includes/navigation.php";  ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
            <h1 class="page-header">
                    Blog Posts<small></small>
                </h1>
            <?php 

//prblm in pagination solved
            $per_page = 3;


            if(isset($_GET['page'])) {


           $page = $_GET['page'];

            } else {


                $page = "";
            }


            if($page == "" || $page == 1) {

                $page_1 = 0;

            } else {

                $page_1 = ($page * $per_page) - $per_page;

            }
            
            //$per_page; //0
            // echo $page_1; //3
            // die();
            
            if(isset($_SESSION['username']) && $_SESSION['user_role'] == 'Admin'){
                $post_query_count = "SELECT * FROM posts "; // 0,5 

                // echo "ss";
                // die();

            }
            else{
                $post_query_count = "SELECT * FROM posts WHERE post_status = 'Published' ";
                
            }
             



                
                $find_count = mysqli_query($connection, $post_query_count);
                $count = mysqli_num_rows($find_count); //5
                

                if($count < 1){


                    echo "NO POSTS";
                }
               else{
                   
                $count = ceil($count / $per_page);
                
                
               

                if(isset($_SESSION['username']) && $_SESSION['user_role'] == 'Admin'){
                    $query = "SELECT * FROM posts LIMIT $page_1, $per_page "; // 0,5 
    
                    // echo "ss";
                    // die();
    
                }
                else{
                    $query = "SELECT * FROM posts WHERE post_status = 'Published' LIMIT $page_1, $per_page  ";
                    
                }


                



                // $query = "SELECT * FROM posts LIMIT $page_1, $per_page";
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

               

                <!-- First Blog Post -->




                <h2>
                    <a href="post/<?php echo $post_id; ?>"><?php echo $post_title; ?></a>
                </h2>
                <p class="lead">
                    by <a href="author_posts.php?author=<?php echo $post_author; ?>&p_id=<?php echo $post_id; ?>"><?php echo $post_author; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span><?php echo date('d/F/y',$post_date); ?></p>
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

        

<hr>
      
    </div>  

        <ul class="pager">
        <?php
        
        for($i=1; $i <= $count; $i++){
            if($i == $page){
               

                echo "<li><a class='active_link' href='index.php?page={$i}'>{$i}</a></li>";
            }else{
                // echo "hi";
                echo "<li><a href='index.php?page={$i}'>{$i}</a></li>";
        }}
        
?>
        </ul>

        <?php include "includes/footer.php";  ?>