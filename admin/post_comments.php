<?php include "includes/admin_header.php" ?>
<?php include "includes/admin_navigation.php" ?>

    <div id="wrapper">

        <!-- Navigation -->
        

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Blog Content -->
                <div class="row">
                    <div class="col-lg-12">
                    <h1 class="page-header">
                            Welcome to Admin Panel
                            <small><?php 
                                echo $_SESSION['username'];
                            ?></small>
                        </h1>


<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Author</th>
            <th>Comment</th>
            <th>Email</th>
            <th>Status</th>
            <th>Date</th>
            <th>In respone to</th>
            <th>Approve</th>
            <th>Not Approve</th>
            
            <th>Delete</th>
            
        </tr>
    </thead>
    <tbody>
    <?php  
    
    
    $query = "SELECT * FROM comments WHERE comment_post_id =" . mysqli_real_escape_string($connection,$_GET['id']);
    $select_comments = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($select_comments))
    {
        $comment_id          = $row['comment_id'];
        $comment_post_id     = $row['comment_post_id'];
        $comment_author      = $row['comment_author'];
        $comment_content     = $row['comment_content'];
        $comment_email       = $row['comment_email'];
        $comment_status      = $row['comment_status'];
        $comment_date        = strtotime($row['comment_date']);

        echo "<tr>";  
        echo "<td>{$comment_id}</td>"; 
        //echo "<td>{$comment_post_id}</td>"; 
        echo "<td>{$comment_author}</td>";
        echo "<td>{$comment_content}</td>";
        echo "<td>{$comment_email}</td>";
        //echo "<td><img width=200 src='../images/{$post_image}'></td>";
            
        if ($comment_status == 'Unapproved')
        {
            echo "<td>";
            echo '<b><span style="color:#ff00e8;text-align:center;">UNAPPROVED</span></b>';
            echo "</td>";
        }
        elseif ($comment_status == 'Approved')
        {
            echo "<td>";
            echo '<b><span style="color: green ;text-align:center;">APPROVED</span></b>';
            echo "</td>";
        }
        else
        {
            echo "<td>{$comment_status}</td>";
        }

        echo "<td>";
        echo date('d/F/Y', $comment_date);
        echo "</td>";

        $query = "SELECT * FROM posts WHERE post_id= $comment_post_id";
        $select_post_id_query = mysqli_query($connection,$query);

        while($row = mysqli_fetch_assoc($select_post_id_query))
        {
            $post_id = $row['post_id'];
            $post_title = $row['post_title'];
            echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
        }

        echo "<td><button class='btn btn-success'> <a href='post_comments.php?approve=$comment_id&id=" . $_GET['id'] . " ' style='color:white;'>Approve</a></button></td>";
        echo "<td><button class='btn btn-primary'><a href='post_comments.php?unapprove=$comment_id&id=" . $_GET['id'] . " ' style='color:white;'>Un Approve</a></button></td>";
        
        //echo "<td><a href='posts.php?source=edit_post&p_id='>Edit</a></td>";
        echo "<td><button class='btn btn-danger'><a href='post_comments.php?delete=$comment_id&id=" . $_GET['id'] . " ' style='color:white;'>Delete</a></button></td>";
        echo "</tr>"; 
    }
    
    
    ?>
        
</tbody>
</table>

<?php
if(isset($_GET['approve']))
{
    $the_comment_id = $_GET['approve'];
    $query = "UPDATE comments SET comment_status = 'Approved' WHERE comment_id = $the_comment_id ";
    $approve_comment_query = mysqli_query($connection,$query);
    //echo "<h3>The post of id $the_post_id was deleted successfully!</h3>";
    header("Location: post_comments.php?id=" . $_GET['id'] . "");
    echo "<h3>The comment of id $the_comment_id was approved successfully!</h3>";
}


if(isset($_GET['unapprove']))
{
    $the_comment_id = $_GET['unapprove'];
    $query = "UPDATE comments SET comment_status = 'Unapproved'  WHERE comment_id = $the_comment_id ";
    $unapprove_comment_query = mysqli_query($connection,$query);
    //echo "<h3>The post of id $the_post_id was deleted successfully!</h3>";
    header("Location: post_comments.php?id=" . $_GET['id'] . "");
    echo "<h3>The comment of id $the_comment_id was unapproved successfully!</h3>";
}




if(isset($_GET['delete']))
{
    $the_comment_id = $_GET['delete'];
    $query = "DELETE FROM comments WHERE comment_id = {$the_comment_id} ";
    $delete_query = mysqli_query($connection,$query);

    $query = "UPDATE posts SET post_comment_count = post_comment_count -1 WHERE post_id = {$comment_post_id} ";
    $delete_comm_count_query = mysqli_query($connection,$query);

    header("Location: post_comments.php?id=" . $_GET['id'] . "");
    echo "<h3>The post of id $the_comment_id was deleted successfully!</h3>";
}

?>



</div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

   
<?php include "includes/admin_footer.php" ?>