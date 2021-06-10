<?php

function insert_categories()
    {
        global $connection;
        if(isset($_POST['submit']))
        {
            // echo "<h1>hi from admin cat</h1>" ;
            $cat_title= $_POST['cat_title'];
            if($cat_title == "" || empty($cat_title) )
            {
                echo "The category name cannot be empty";
            }
            
            else
            {
                $query = "INSERT INTO categories(cat_title) ";
                $query .= "VALUE('{$cat_title}') ";

                $create_category_query = mysqli_query($connection, $query);

                if(!$create_category_query)
                {
                    die('dead insert at category admin' .mysqli_error($connection));
                }
                else
                {
                    echo "The category $cat_title was added successfully";
                }
            }
        }

}
function findAllCategories()
{
    global $connection;
    $query = "SELECT * FROM categories";
    $select_categories = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($select_categories))
    {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];
        echo "<tr>";
        echo "<td>{$cat_id}</td>";
        echo "<td>{$cat_title}</td>";
        echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
        echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
        echo "</tr>";
    }
}


function deleteCategories()
{
    global $connection;
    if(isset($_GET['delete']))
    {
        $cat_id_del = $_GET['delete'];
        echo $cat_id_del;
        $query = "DELETE FROM categories WHERE cat_id = {$cat_id_del} ";
        $delete_query = mysqli_query($connection, $query);
        header("Location: categories.php");
    } 
}


function confirmQuery($result) {
    global $connection;
    if(!$result ) { 
          die("QUERY FAILED ." . mysqli_error($connection)); 
      }
}


?>