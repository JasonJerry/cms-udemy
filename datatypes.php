
<html>
<head>
	<title>Datatypes</title>
</head>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>
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
<body>
<?php
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
      echo "Value in db of int(11):";
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



//submit unsigned

if(isset($_POST['submitunsigned']))
{

    
    $unsignedint_value = $_POST['unsigned'];
   
    $query = "INSERT into datatypes(unsignedint_val) VALUES('{$unsignedint_value}')";
    $submit_query = mysqli_query($connection, $query);

    $get_query = "SELECT unsignedint_val FROM `datatypes` ORDER BY id DESC LIMIT 1";
    $last_line_query = mysqli_query($connection, $get_query);
    while($row = mysqli_fetch_assoc($last_line_query)){
      
      echo "Given unsigned int value = $unsignedint_value";

      echo "<br>";
      echo "Value in db of unsigned int:";
      echo $smallint = $row['unsignedint_val'];
      echo "<br>";

    }
}
?>

	
<table style="width:100%" class="tablemain" >
<tr>
<td text-align: center;>

    <table style="width:60%" class="table1">

    <tbody style="width: max-content;" text-align: center;>
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


                   <form role="form" action="" method="post" id="login-form" autocomplete="off">
                       
   
                      

                       <div class="form-group">
                           <label for="unsigned" class="sr-only"></label>
                           <input type="text" name="unsigned" id="unsigned" class="form-control" placeholder="Enter unsigned int">
                           <button type="submit" name="submitunsigned" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">Submit</button>
                       </div>
                    
                       <br>
                   </form>

                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>
</tbody>
</table>
</td>


</div>
<!-- <td><br>
</td>
<td>
<td><br>
</td> -->
<td text-align: center;>
<table style="width:80%" class="table2">
<div class="title">
		<h1>Student form</h1>
	</div>
    <form action="" method="post">
    <div class="input-group">
    <label for="stuname">Name</label><br>
        <input name="stuname" type="text" placeholder="(VARCHAR)" class="form-control">
        
    </div><br>

    <div class="input-group">
    <label for="stuname">reg.no</label><br>
        <input name="regno" type="number" placeholder="(smallint(6))" class="form-control">
        
    </div><br>

    <div class="input-group">
    <label for="dob">DOB</label><br>
        <input name="dob" type="date" placeholder="date" class="form-control">
        
    </div><br>

    <div class="input-group">
    <label for="percent">12th Percentage</label><br>
        <input name="percent" type="text" placeholder="float" class="form-control">
        
    </div><br>

    <div class="input-group">
    <label for="temp">Temp</label><br>
        <input name="temp" type="text" placeholder="signedint" class="form-control">
        
    </div><br>


    <div class="input-group">
    <button name="submitstudent" type="submit">Submit</button>
    </div>

    
    <br>
    
    </form>  

    


<?php
if(isset($_POST['submitstudent'])){
    

    $username = $_POST['stuname'];
    $regno    = $_POST['regno'];
   
    $dob =  $_POST['dob'];
    // die();
    $percent = $_POST['percent'];
    // $temp = $_POST['temp'];
    
    // die();
            
    $query = "INSERT INTO datatypes(name, smallint_val, date_val, float_val, ) ";              
    $query .= "VALUES('{$username}', {$regno}, '{$dob}' , {$percent}) ";        
    $add_query = mysqli_query($connection,$query);

   ?>
    <thead>
        <tr style="width:max-content">
        <th>Name</th>
        <th>Regno</th>
        <th >Dob</th>
        <th>percent</th>
        <!-- <th>temp</th> -->

        </tr>
        </thead>
        <tbody style="width: max-content;">

        <?php
        $query = "SELECT * from datatypes ORDER BY id DESC LIMIT 1";
        $list_query =mysqli_query($connection, $query);
        while($row = mysqli_fetch_assoc($list_query)) 
        {
            $namestu = $row['name'];
            $regstu = $row['smallint_val'];
            $dobstu = strtotime($row['date_val']);
            $percentstu = $row['float_val'];
            // $tempstu = $row['signedint_val'];
            
            echo "<tr>";

            // echo "<td>";
            echo "<td>{$namestu}</td>";
            // echo "</td>";
        
            // echo "<td>";
            echo "<td>{$regstu}</td>";
            // echo "</td>";

            echo "<td>";
            echo date('d/F/Y', $dobstu);
            echo "</td>";

            // echo "<td>";
            echo "<td>{$percentstu}</td>";
            // echo "</td>";

            // echo "<td>";
            // echo "<td>{$tempstu}</td>";
            // echo "</td>";




            echo "</tr>";


        }





}


        ?>






</tbody>
</table>
</td>

</tr>
</table>
</body>
</html>