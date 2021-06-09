<?php include "includes/admin_header.php" ?>

<?php include "includes/admin_navigation.php" ?>
    <div id="wrapper">

        <!-- Navigation -->
        

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin Panel
                            <small>Author</small>
                        </h1>
                    
                            <div class="col-xs-6">
                            <?php 
                            if(isset($_POST['submit']))
                            {
                                // echo "<h1>hi from admin cat</h1>" ;
                                $cat_title= $_POST['cat_title'];
                                if($cat_title == "" || empty($cat_title))
                                {
                                    echo "The category name cannot be empty";
                                }
                                else
                                {
                                    $query = "INSERT INTO categories(cat_title) ";
                                    $query .= "VALUE('{$cat_title}') ";

                                    $create_category_query = mysqli_query($connection, $query);

                                    if(!$create_category_query)
                                    {
                                        die('dead insert at category admin' .mysqli_error($connection));
                                    }
                                    else
                                    {
                                        echo "The category $cat_title was added successfully";
                                    }
                                }
                            }
                            
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
                            
                            </div>

                            <div class="col-xs-6">
                            <?php
                            $query = "SELECT * FROM categories";
                            $select_categories = mysqli_query($connection, $query);
                            ?>
                            <table class="table table-bordered table-hover">
                                <thread>
                                    <tr>
                                        <th>ID</th>
                                        <th>Category Title</th>
                                    </tr>
                                </thread>
                                <tbody>

                                <?php
                            while ($row = mysqli_fetch_assoc($select_categories))
                            {
                                $cat_id = $row['cat_id'];
                                $cat_title = $row['cat_title'];
                                echo "<tr>";
                                echo "<td>{$cat_id}</td>";
                                echo "<td>{$cat_title}</td>";
                                echo "</tr>";
                            }
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