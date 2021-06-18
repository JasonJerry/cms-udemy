<?php  include "includes/db.php"; ?>
 <?php  include "includes/header.php"; ?>

<?php

    if(isset($_POST['submit']))
    {
        $username = $_POST['username'];
        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $email    =$_POST['email'];
        $password = $_POST['password'];



        if(!empty($username) && !empty($user_lastname) && !empty($user_firstname) && !empty($email) && !empty($password) )
        {

        
            $username = mysqli_real_escape_string($connection, $username);
            $email = mysqli_real_escape_string($connection, $email);
            $password =  mysqli_real_escape_string($connection, $password);

            $query = "SELECT randsalt from users ";
            $select_randsalt_query = mysqli_query($connection, $query);
            if(!$select_randsalt_query)
            {
                die("died at registration");
            }

            //while created for encrypt - blowfish
            // while($row = mysqli_fetch_array($select_randsalt_query))
            // {
            // $salt = $row['randsalt'];
            // $password = crypt($password, $salt);
            // }

            //$row = mysqli_fetch_array($select_randsalt_query);
            $salt = '$2y$10$iusesomecrazystrings22';
            $password = crypt($password, $salt);

            $query = "INSERT INTO users(username, user_firstname, user_lastname, user_email, user_password , user_role) ";              
            $query .= "VALUES('{$username}', '{$user_firstname}', '{$user_lastname}', '{$email}', '{$password}', 'Subscriber') ";               
            $register_user_query = mysqli_query($connection, $query);  
            // confirmQuery($register_user_query); 
            $message = "Your registration is successful!";
            
        }  
        else
        {
            //echo "<script>alert('Fields cannot be empty!')</script>";
            $message = "Fill all fields!";
        }

    }
    else{
        $message = "";
    }



?>
    <!-- Navigation -->
    
    <?php  include "includes/navigation.php"; ?>
    
 
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Register</h1>
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                      <h6 class="text-center"><?php echo $message; ?></h6>  
                    <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username">
                        </div>
                        <div class="form-group">
                            <label for="user_firstname" class="sr-only">Firstname</label>
                            <input type="text" name="user_firstname" id="user_firstname" class="form-control" placeholder="Enter Firstname">
                        </div>
                        <div class="form-group">
                            <label for="user_lastname" class="sr-only">Lastname</label>
                            <input type="text" name="user_lastname" id="user_lastname" class="form-control" placeholder="Enter Lastname">
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>
