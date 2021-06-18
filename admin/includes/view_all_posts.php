<?php


if(isset($_POST['checkBoxArray']))
{
    foreach($_POST['checkBoxArray'] as $postValueId )
    {
        
        $bulk_options = $_POST['bulk_options'];
              
            switch($bulk_options) 
            {
            case 'Published':
              
                $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = {$postValueId}  ";       
                $update_to_published_status = mysqli_query($connection,$query);       
                confirmQuery($update_to_published_status);
                break;

            case 'Approved':
              
                $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = {$postValueId}  ";           
                $update_to_approved_status = mysqli_query($connection,$query);       
                confirmQuery($update_to_approved_status);
                break;
                  
                  
            case 'Draft':
              
                $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = {$postValueId}  ";
                $update_to_draft_status = mysqli_query($connection,$query);
                            
                confirmQuery($update_to_draft_status);    
                break;
                  
        
                  
            case 'delete':
              
                $query = "DELETE FROM posts WHERE post_id = {$postValueId}  ";
                        
                $update_to_delete_status = mysqli_query($connection,$query);
                            
                confirmQuery($update_to_delete_status);
                
                break;


                case 'clone':
              
                    $query = "SELECT * FROM posts WHERE post_id = {$postValueId}  ";
                            
                    $select_post_query = mysqli_query($connection,$query);
                                
                    //confirmQuery($update_to_delete_status);
                    while($row = mysqli_fetch_array($select_post_query))
                    {
                        $post_id = $row['post_id'];
                        $post_author = $row['post_author'];
                        $post_title = $row['post_title'];
                        $post_category_id = $row['post_category_id'];
                        $post_status = $row['post_status'];
                        $post_image = $row['post_image'];
                        $post_tags = $row['post_tags'];
                        $post_comment_count = $row['post_comment_count'];
                        $post_date = strtotime($row['post_date']); // converted to mm/dd/yyyy 
                        $post_content =$row['post_content'];
                        

        
                    }

                    $query = "INSERT INTO posts(post_category_id, post_title,post_author,post_date,post_image,post_content,post_tags,post_status) ";

                    $query .= "VALUES('{$post_category_id}','{$post_title}','{$post_author}', now(),'{$post_image}','{$post_content}',
                    '{$post_tags}','{$post_status}' )"; //removed $post_comment_count

                    $copy_query = mysqli_query($connection, $query);
                    
                      
                    if(!$copy_query)
                    {
                        die("died at view all posts copy query");
                    }
                    break;
        }


    }
}



?>


<form action="" method="post">


<table class="table table-bordered table-hover">

<div id="bulkOptionContainer" class="col-xs-4" style="padding: 0px;">

        <select class="form-control" name="bulk_options" id="">
        <option value="">Select Options</option>
        <option value="Published">Publish</option>
        <option value="Approved">Approve</option>
        <option value="Draft">Draft</option>
        <option value="delete">Delete</option>
        <option value="clone">Clone</option>
        
        </select>

        </div> 

            
        <div class="col-xs-4">

        <input type="submit" name="submit" class="btn btn-success" value="Apply">
        <a class="btn btn-primary" href="posts.php?source=add_post">Add New</a>

        </div>
       <thead>
            
        <tr>
            <th><input id="selectAllBoxes" type="checkbox"></th>
            <th>ID</th>
            <th>Author</th>
            <th>Title</th>
            <th>Category</th>
            <th>Status</th>
            <th>Image</th>
            <th>Tags</th>
            <th>Comments</th>
            <th>Date</th>
            <th>Views Count</th>
            <th>View</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
    <?php  
    
    
    $query = "SELECT * FROM posts ORDER BY post_id DESC ";
    $select_posts = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($select_posts))
    {
        $post_id = $row['post_id'];
        $post_author = $row['post_author'];
        $post_title = $row['post_title'];
        $post_category_id = $row['post_category_id'];
        $post_status = $row['post_status'];
        $post_image = $row['post_image'];
        $post_tags = $row['post_tags'];
        $post_comment_count = $row['post_comment_count'];
        $post_date = strtotime($row['post_date']); // converted to mm/dd/yyyy 
        $post_content =$row['post_content'];
        $post_views_count =$row['post_views_count'];
        echo "<tr>";  
        ?>
        <td><input class='checkBoxes' type='checkbox' name='checkBoxArray[]' value='<?php echo $post_id; ?>'></td>
        <?php
        //echo "";
        echo "<td>{$post_id}</td>"; 
        echo "<td>{$post_author}</td>";
        echo "<td><b><span style='color:crimson'>{$post_title}</b></span></td>";

        $query = "SELECT * FROM categories WHERE cat_id = {$post_category_id} ";
                            
        $select_categories_id = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($select_categories_id))
        {
            $cat_id = $row['cat_id'];
            $cat_title = $row['cat_title'];
        

        echo "<td>{$cat_title}</td>";

        }

        if ($post_status == 'Approved')
        {
            echo "<td>";
            echo '<b><span style="color:green;text-align:center;">APPROVED</span></b>';
            echo "</td>";
        }
        if ($post_status == 'Published')
        {
            echo "<td>";
            echo '<b><span style="color:red;text-align:center;">PUBLISHED</span></b>';
            echo "</td>";
        }
        if ($post_status == 'Draft')
        {
            echo "<td>";
            echo '<b><span style="color:#a200ff;text-align:center;">DRAFT</span></b>';
            echo "</td>";
        }
        //echo "<td>{$post_status}</td>";
        
        echo "<td><img width=200 src='../images/{$post_image}'></td>";
        echo "<td>{$post_tags}</td>";
        echo "<td>{$post_comment_count}</td>";

        echo "<td>";
        echo date('d/F/Y', $post_date);
        echo "</td>";
        //echo "<td>{$post_date}</td>";
        echo "<td><a href='posts.php?reset={$post_id}'>{$post_views_count}</a></td>";



        echo "<td><b><a href='../post.php?p_id={$post_id}'>View Post</a></b></td>";
        echo "<td><b><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></b></td>";
        echo "<td><b><a onclick=\"javascript: return confirm('Sure to delete?'); \" href='posts.php?delete={$post_id}' style='color:red'>Delete</a></b></td>";
        echo "</tr>"; 
    }
    
    
    ?>
        
</tbody>
</table>
</form>
<?php
if(isset($_GET['delete']))
{
    $the_post_id = $_GET['delete'];
    $query = "DELETE FROM posts WHERE post_id = {$the_post_id} ";
    $delete_query = mysqli_query($connection,$query);
    //echo "<h3>The post of id $the_post_id was deleted successfully!</h3>";
    header("Location: posts.php");
    echo "<h3>The post of id $the_post_id was deleted successfully!</h3>";
}




if(isset($_GET['reset']))
{
    $the_post_id = $_GET['reset'];
    $query = "UPDATE posts SET post_views_count = 0 WHERE post_id = " . mysqli_real_escape_string($connection, $_GET['reset']) . " ";
    $reset_query = mysqli_query($connection,$query);
    //echo "<h3>The post of id $the_post_id was deleted successfully!</h3>";
    header("Location: posts.php");
    
}
?>


<!-- 

PS for date:

    https://www.tutorialspoint.com/change-date-format-in-db-or-output-to-dd-mm-yyyy-in-php-mysql -->