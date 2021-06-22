

<?php 

if(isset($_POST['create_user']))
{

   //$user_id = $_POST['user_id'];
   $user_firstname    = escape($_POST['user_firstname']);
   $user_lastname     = escape($_POST['user_lastname']);
   $user_role         = escape($_POST['user_role']);
   $username          = escape($_POST['username']);
   $user_email        = escape($_POST['user_email']);
   $user_password     = escape($_POST['user_password']);

   $user_password = password_hash($user_password, PASSWORD_DEFAULT, array('cost' => 10)); // bigger the cost number slower the algo work

    // move_uploaded_file($post_image_temp, "../images/$post_image");
   $query = "SELECT * FROM users WHERE user_email = '$user_email' "; //checking for same email
   $create_user_query_check = mysqli_query($connection, $query);

    // check for same username

    $query = "SELECT * FROM users WHERE username = '$username' ";
    $create_user_query_check2 = mysqli_query($connection, $query);

    if(mysqli_num_rows($create_user_query_check) > 0) //email
   {
       echo $error = "Email has already been taken";
   }

   elseif(mysqli_num_rows($create_user_query_check2) > 0) //usernmae
   {
       echo $error = "Username has already been taken";
   }

   
   
   else{
    
    $query = "INSERT INTO users(user_firstname, user_lastname, user_role,username,user_email,user_password) ";              
    $query .= "VALUES('{$user_firstname}','{$user_lastname}','{$user_role}','{$username}','{$user_email}', '{$user_password}') ";               
    $create_user_query = mysqli_query($connection, $query);  
    confirmQuery($create_user_query);     
    echo "User Creation successful " . " " . "<a href='users.php'>View Users</a> "; 
}}

?>

    <form action="" method="post" enctype="multipart/form-data">    
     
     
     <!-- <div class="form-group">
        <label for="title">Post Title</label>
         <input type="text" class="form-control" name="title">
     </div> -->

        <!-- <div class="form-group">
      <label for="category">Category</label>
      <select name="post_category" id="">
      </select>
      
      </div> -->


     <div class="form-group">
        <label for="title">Firstname</label>
         <input type="text" class="form-control" name="user_firstname">
     </div>  
     
     <div class="form-group">
        <label for="title">Lastname</label>
         <input type="text" class="form-control" name="user_lastname">
     </div>  

<!-- 
      <div class="form-group">
      <label for="users">Users</label>
      <select name="post_user" id="">
          
          
       
      </select>
     
     </div> -->





     <!-- <div class="form-group">
        <label for="title">Post Author</label>
         <input type="text" class="form-control" name="author">
     </div> -->
     
     

      <!-- <div class="form-group">
        <select name="post_status" id="">
            <option value="draft">Post Status</option>
            <option value="published">Published</option>
            <option value="draft">Draft</option>
        </select>
     </div> -->
     
     
     
   <!-- <div class="form-group">
        <label for="post_image">Post Image</label>
         <input type="file"  name="image">
     </div> -->



<div class="form-group">
       <select name="user_role" id="user_role" required>
       <option value="Select">Select Options</option>
       <option value="Admin">Admin</option>
       <option value="Subscriber">Subscriber</option>
       </select>
     </div>            


     <div class="form-group">
        <label for="post_tags">Username</label>
         <input type="text" class="form-control" name="username">
     </div>
     
     <div class="form-group">
        <label for="email">Email</label>
       <input type="email" name="user_email" class="form-control">
     </div>

     <div class="form-group">
        <label for="password">Password</label>
       <input type="password" name="user_password" class="form-control">
     </div>
     
     

      <div class="form-group">
         <input class="btn btn-primary" type="submit" name="create_user" value="Add User">
     </div>


</form>
   