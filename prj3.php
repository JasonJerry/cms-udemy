<html>
<body>
<?php

$connection2 = mysqli_connect('localhost','root','','sqldt');
if(isset($_POST['submit1']))
{
   $integer = $_POST['integer'] ;
   echo "integer = $integer";
   echo "<br>";

   $query = "INSERT INTO numdt(integerval) VALUES ({$integer}) ";
   
   $create_query = mysqli_query($connection2, $query);
   
//   $row = mysqli_fetch_assoc($create_query);
//   die();
}

else{
    echo "no";
}


if(isset($_POST['submit2']))
{
  
   echo "<br>";
    $tinyint = $_POST['tiny'];
    echo "tiny = $tinyint";
   $query = "INSERT INTO numdt(tinyintval) VALUES ({$tinyint}) ";
   
   $create_query = mysqli_query($connection2, $query);
   
//   $row = mysqli_fetch_assoc($create_query);
//   die();
}

?>
<form action="" method="post">

<div>
<label for="integer">Enter integer</label>
<input type="number" value = "" name="integer" maxlength = "9">
</div>
<button name="submit1">submit</button>
</div>
</form>

<form action="">

<div>
<label for="tiny">Enter tiny int</label>
<input type="number" value = "" name="tiny" maxlength = "3">
</div>

<div>

<button name="submit2">submit</button>
</div>

</form>









</body>

</html>