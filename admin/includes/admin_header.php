<?php ob_start(); ?>
<?php session_start(); ?>
<?php include "../includes/db.php"; ?>
<?php include "functions.php"; ?>

<?php
//print_r ($_SESSION);
// if(!isset($_SESSION['user_role']))
// //if( isset($_SESSION['user_role']) && ($_SESSION['user_role']=='admin') && ($_SESSION['user_role']=='') && ($_SESSION['username']=='') && ($_SESSION['first_name']=='') && ($_SESSION['last_name']=='') )
// //if( isset($_SESSION['user_role']) || ($_SESSION['user_role'] =='Admin') )
// {
//     if($_SESSION['user_role'] == 'Admin')
//     {
//         // header("Location: ../index.php");
//         //header("Location: ../admin");
//         echo $user_role = $_SESSION['user_role'];
    
//     }
// }
// else
// {
//     echo $user_role = $_SESSION['user_role'];
//     //header("Location: ../admin");
//     //header("Location: ../index.php");
// }

// print_r ($_SESSION);
// var_dump($_SESSION['user_role']);&& ($_SESSION['user_role']!=='admin') && ($_SESSION['user_role']=='')
if( !isset($_SESSION['user_role']) || ($_SESSION['user_role']!=='Admin') || ($_SESSION['user_role']=='') )
{
// if('admin'== $user_role)
// die();
header("Location: ../index.php");
}
else{
    //var_dump($_SESSION);
    // die();
}

?>



<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CMS - Jason</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

        <!-- include summernote css/js -->
<!-- <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet"> -->

<link rel="stylesheet" href="css/summernote.css">

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

</head>
<style>
th {
        /* border: 1px solid black; */
        text-align: center;
        padding: 8px;
        }
</style>

<body>