<?php include "includes/admin_header.php" ?>
<?php include "includes/admin_navigation.php" ?>

    <div id="wrapper">

        <!-- Navigation -->
        

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Blog Content -->
                <div class="row">
                    <div class="col-lg-12">
                    <h1 class="page-header">
                            Welcome to Admin Panel
                            <small><?php 
                                echo $_SESSION['username'];
                            ?></small>
                        </h1>
                    <?php  
                       if(isset($_GET['source']))
                       {
                           $source = $_GET['source'];
                           
                       }
                       else
                       {
                           $source = '';
                           
                       }
                       
                       switch($source)
                       { 
                            case 'add_post';
                            include "includes/add_posts.php";
                            break;

                            case 'edit_post';
                            include "includes/edit_posts.php";
                            break;

                            case '200';
                            echo "Nice 200";
                            break;

                            default:
                            include "includes/view_all_comments.php";
                            break;
                       }


                     
                    ?>
                        
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

   
<?php include "includes/admin_footer.php" ?>