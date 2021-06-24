<html>
<body>
<style>
        table {
        font-family: arial, sans-serif;
        /* border-collapse: collapse; */
        width: 'auto';
        
        }

        td, th {
        /* border: 1px solid black; */
        /* align-content: center; */
        /* text-align: center; */
        padding: 8px;
        }
        </style>
<?php
//include "includes/header.php";
$connection = mysqli_connect('localhost', 'root', '', 'test');

if(isset($_POST['submit']))
{

    $int_value = $_POST['int'];
    
    $query = "INSERT into datatypes(int_value) VALUES({$int_value})";
    $submit_query = mysqli_query($connection, $query);

    $get_query = "SELECT int_value FROM `datatypes` ORDER BY id DESC LIMIT 1";
    $last_line_query = mysqli_query($connection, $get_query);
    while($row = mysqli_fetch_assoc($last_line_query)){
      echo "Given int(11) value = $int_value";

      echo "<br>";
      echo $int = $row['int_value'];

      echo "<br>";
      
   
    }
}

//submit tiny

if(isset($_POST['submittiny']))
{

    
    $tinyint_value = $_POST['tinyint'];
   
    $query = "INSERT into datatypes(tinyint_val) VALUES('{$tinyint_value}')";
    $submit_query = mysqli_query($connection, $query);

    $get_query = "SELECT tinyint_val FROM `datatypes` ORDER BY id DESC LIMIT 1";
    $last_line_query = mysqli_query($connection, $get_query);
    while($row = mysqli_fetch_assoc($last_line_query)){
      
      echo "Given tinyint(4) value = $tinyint_value";

      echo "<br>";
      echo "Value in db of tinyint:";
      echo $tinyint = $row['tinyint_val'];

      echo "<br>";
      // echo "Given value = $smallint_value";

      // echo "<br>";
      // echo "Value in db of smallint:";
      // echo $smallint = $row['smallint_val'];
   
    }
}

//submit small

if(isset($_POST['submitsmall']))
{

    
    $smallint_value = $_POST['smallint'];
   
    $query = "INSERT into datatypes(smallint_val) VALUES('{$smallint_value}')";
    $submit_query = mysqli_query($connection, $query);

    $get_query = "SELECT smallint_val FROM `datatypes` ORDER BY id DESC LIMIT 1";
    $last_line_query = mysqli_query($connection, $get_query);
    while($row = mysqli_fetch_assoc($last_line_query)){
      
      echo "Given smallint(6) value = $smallint_value";

      echo "<br>";
      echo "Value in db of smallint:";
      echo $smallint = $row['smallint_val'];
      echo "<br>";

    }
}
?>

<table>

    <tr>
        <td>
            <table>
                <tr>
                    <td>


<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Datatypes</h1>
                    <form role="form" action="" method="post" id="login-form" autocomplete="off">
                       
                    <div class="form-group">
                            <label for="int" class="sr-only"> </label>
                            <input type="text" name="int" id="int" class="form-control" placeholder="Enter Integer (11)">
                            <button type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">Submit</button>
                        </div>
                        <br>
                     
                        <!-- <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register"> -->
                    </form>
<!-- tiny -->

                    <form role="form" action="" method="post" id="login-form" autocomplete="off">
                       
   
                           <div class="form-group">
                               <label for="tinyint" class="sr-only"></label>
                               <input type="text" name="tinyint" id="tinyint" class="form-control" placeholder="Enter Tinyint (4)">
                               <button type="submit" name="submittiny" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">Submit</button>
                           </div>
                           <br>
                       </form>

<!-- smallint -->

                       <form role="form" action="" method="post" id="login-form" autocomplete="off">
                       
   
                      

                       <div class="form-group">
                           <label for="smallint" class="sr-only"></label>
                           <input type="text" name="smallint" id="smallint" class="form-control" placeholder="Enter smallint (6)">
                           <button type="submit" name="submitsmall" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">Submit</button>
                       </div>
                    
                       <br>
                   </form>

                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>
</td>
                </tr>


                <!-- table 1 ends here -->
                
            </table>
        </td>
        
        
        
        <td text-align: center;>
<table style="width:80%" class="table2">
<div class="title">



                    <!-- table 2 goes here  -->




                    <section id="student-form">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Student Info</h1>
                    <form role="form" action="" method="post" id="login-form" autocomplete="on">
                       
                    <div class="form-group">
                            <label for="int" class="sr-only"> </label>
                            <input type="text" name="int" id="int" class="form-control" placeholder="Enter Integer (11)">
                            <button type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">Submit</button>
                        </div>
                        <br>
                     
                        <!-- <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register"> -->
                
                       
   
                           <div class="form-group">
                               <label for="tinyint" class="sr-only"></label>
                               <input type="text" name="tinyint" id="tinyint" class="form-control" placeholder="Enter Tinyint (4)">
                               <button type="submit" name="submittiny" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">Submit</button>
                           </div>
                           <br>
                      
                       
   
                      

                       <div class="form-group">
                           <label for="smallint" class="sr-only"></label>
                           <input type="text" name="smallint" id="smallint" class="form-control" placeholder="Enter smallint (6)">
                           <button type="submit" name="submitsmall" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">Submit</button>
                       </div>
                    
                       <br>
                   </form>

                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>





                    </td>
                <!-- </tr> -->
            </table>
        </td>
    </tr>
</table>

</body>

</html>