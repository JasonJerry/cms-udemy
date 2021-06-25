<?php  include "includes/db.php"; ?>
 <?php  include "includes/header.php"; ?>
 <?php //include "./admin/functions.php"
?>
<?php

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $username = trim($_POST['username']);
        $email    = trim($_POST['email']);
        $password = trim($_POST['password']);
        $user_firstname = trim($_POST['user_firstname']);
        $user_lastname = trim($_POST['user_lastname']);

        $error = [

            'username'=> '',
            'email'=>'',
            'password'=>''

        ];


        if(strlen($username) < 4){

            $error['username'] = 'Username needs to be longer';


        }

        if($username ==''){

            $error['username'] = 'Username cannot be empty';


        }


        if(username_exists($username)){

            $error['username'] = 'Username already exists, pick another another';


        }



        if($email ==''){

            $error['email'] = 'Email cannot be empty';


        }


        if(email_exists($email)){

            $error['email'] = 'Email already exists, <a href="index.php">Please login</a>';


        }


        if($password == '') {


            $error['password'] = 'Password cannot be empty';

        }



        foreach ($error as $key => $value) {
            
            if(empty($value)){

                unset($error[$key]);
            }



        } // foreach

        if(empty($error)){

            register_user($username, $email, $password, $user_firstname, $user_lastname);
                //login_user($username, $password);
            $data['message'] = $username;
            login_user($username, $password);
    
    
        }

        


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
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="on">
                      <h6 class="text-center"><?php //echo $message; ?></h6>  
                    <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username" value="<?php echo isset($username) ? $username : '' ;  ?>">
                        
                      
                        <p><?php echo isset($error['username']) ? $error['username'] : '' ?></p>
                        
                        </div>



                        <div class="form-group">
                            <label for="user_firstname" class="sr-only">Firstname</label>
                            <input type="text" name="user_firstname" id="user_firstname" class="form-control" placeholder="Enter Firstname" >
                        </div>
                        <div class="form-group">
                            <label for="user_lastname" class="sr-only">Lastname</label>
                            <input type="text" name="user_lastname" id="user_lastname" class="form-control" placeholder="Enter Lastname">
                        </div>
                        <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com" autocomplete="on" value="<?php echo isset($email) ? $email : '' ?>" >

                             <p><?php echo isset($error['email']) ? $error['email'] : '' ?></p>
              
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">

                            <p><?php echo isset($error['password']) ? $error['password'] : '' ?></p>


                        </div>
                
                        <input type="submit" name="registration" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>
