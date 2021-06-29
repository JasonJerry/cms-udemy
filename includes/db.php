<?php ob_start();
$connection = mysqli_connect('localhost','root','','cms');

$query = "SET NAMES utf8";
mysqli_query($connection,$query);


// if($connection)
// {
//     echo "We are connected";
// }


//New method of connecting db
// $db['DB_HOST'] = "localhost";
// $db['DB_USER'] = "root";
// $db['DB_PASS'] = "";
// $db['DB_NAME'] = "cms";

// foreach($db as $key => $value){
// define($key, $value);
// }

// $connection = mysqli_connect($db['DB_HOST'], $db['DB_USER'] , $db['DB_PASS'] ,$db['DB_NAME']);
// if($connection) {

// echo "We are connected to the db successfully";

// }
?>