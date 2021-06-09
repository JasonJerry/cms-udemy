<?php include "includes/header.php" ?>

<?php include "includes/navigation.php" ?>
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
                            <form action="">
                            
                            <div class="form-group">
                            <label for="cat-title">Add Category </label>
                            <input type="text" class="form-control" name="cat_title">

                            </div>
                            <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                            </div>
                            </form>
                            
                            </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

   
<?php include "includes/footer.php" ?>