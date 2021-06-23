<?php  include "includes/db.php"; ?>
 <?php  include "includes/header.php"; ?>

<?php

$msg = "First line of text\nSecond line of text";

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);

// send email
//mail("someone@example.com","My subject",$msg);

    if(isset($_POST['submit']))
    {
        $msg = "hi";
        
        $to = "jarvistestmail@gmail.com";
        $subject = $_POST['subject'];
        $body = $_POST['body'];
        
        $header = "From: " . $_POST['email'];
    
    
        // send email
        //mail($to , $subject ,$body , $header);
        mail("jarvistestmail@gmail.com","My subject",$msg);
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
                <h1>Contact</h1>
                    <form role="form" action="" method="post" id="login-form" autocomplete="off">
                      
                        <div class="form-group">
                            <label for="name" class="sr-only">Name</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Enter name">
                        </div>
                        
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Enter ur email">
                        </div>
                         <div class="form-group">
                            <label for="subject" class="sr-only">Subject</label>
                            <input type="subject" name="subject" id="key" class="form-control" placeholder="Subject">
                        </div>

                        <div class="form-group">
                            <label for="body" class="sr-only">Body</label>
                           <textarea class="form-control" name="body" id="body" cols="50" rows="10"></textarea>
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Submit">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>
