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
                            <small>Jason</small>
                        </h1>
                    
                            <div class="col-xs-6">
                            <?php 
                            // INSERT CATEGORIES NOW IN FUNCTIONS.PHP
                            insert_categories();
                            ?>



                            <form action="" method="post">
                            
                            <div class="form-group">
                            <label for="cat-title">Add Category </label>
                            <input type="text" class="form-control" name="cat_title">

                            </div>
                            <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                            </div>
                            </form>

                            <!-- form 2 -->
                          
                            <?php // update categories
                            if(isset($_GET['edit']))
                            {
                                $cat_id = $_GET['edit'];
                                include "includes/update_categories.php";

                            }
                            
                            
                            ?>
                            </div>

                            <div class="col-xs-6">
                            <?php
                            
                            ?>
                            <table class="table table-bordered table-hover">
                                <thread>
                                    <tr>
                                        <th>ID</th>
                                        <th>Category Title</th>
                                    </tr>
                                </thread>
                                <tbody>

                            <?php //find all categories query
                            findAllCategories();
                        ?>
                             <?php // delete query
                                
                             deleteCategories();
                             
                            ?>   
                                
                                </tbody>
                            </table></div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

   
<?php include "includes/admin_footer.php" ?>