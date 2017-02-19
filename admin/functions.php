<?php 

function add_categories(){

	global $connect;

	// check if the user pressed submit (add_category_cubmit) button
	if(isset($_POST['add_category_cubmit'])) {
	    $cat_titles = $_POST['input_cat_title_add'];
	    //check if the user filled up the form
	    if ($cat_titles == "" || empty($cat_titles)) {
	       
	    }
	    //if the user filled up the form then inster the data to the category title table in the database
	    else{
	        //this query inserts the data from the form to the cat_title table
	        $query = "INSERT INTO Categories(cat_title)";
	        $query .= "value('{$cat_titles}')";
	        //connect to the database
	        $create_category_query = mysqli_query($connect, $query);
	        //check if the query works if not kill the page and show an error
	        if (!$create_category_query) {
	            die('Query faild' . mysqli_error($connect));
	        }
	    }
	}
}//add categories function

function add_to_menu(){

	global $connect;

            //if the update_category field is set
            if (isset($_POST['add_to_menu'])) {
            $add_to_menu_checked = $_POST['add_to_category_submit'];
            $query = "UPDATE categories SET is_menu = '$add_to_menu_checked' WHERE cat_id = $cat_id";
            $update_query = mysqli_query($connect, $query);
            
                if (!$update_query) {
                    die("Query faild" . mysqli_error($connect));
                  }
            }

}//add categories function

function show_all_categories(){

	global $connect;

    $query = "SELECT * FROM categories";

    $show_all_categories_in_the_table = mysqli_query($connect, $query);
    while ($row = mysqli_fetch_assoc($show_all_categories_in_the_table)) {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];
        $is_menu = $row['is_menu'];
        echo "
        <tr>
            <td align='center'>$cat_id</td>
            <td align='center'>$cat_title 
            <a style='float: right;' href='categories.php?delete=$cat_id'><i class='fa fa-times' aria-hidden='true' style='color: red;'></i> </a></a>
            <a href='categories.php?edit=$cat_id' style='float: right; padding: 0 15px;' ><i class='fa fa-pencil-square-o' aria-hidden='true' style='color: orange;'></i></a>
            </td>
            <td align='center'><form action='categories.php' method='post'><input ".(($is_menu == true)?'checked':'')." type='checkbox' name='add_to_menu'></form></td>
        </tr>
        ";// if the is_menu field on the database is true then mark the checkbox as checked
        }
                if (isset($_POST['add_to_category_submit'])) {
            $add_to_menu_checked = $_POST['add_to_menu'];
            $query = "UPDATE categories SET is_menu = '$add_to_menu_checked' WHERE cat_id = $cat_id";
            $update_query = mysqli_query($connect, $query);
                  ?>
            <form action='categories.php' method='post'><input type='submit' name='add_to_category_submit' value='add' class='btn btn-default'></form>
            <?php
            }

        //if the update_category field is set

            

}//show_all_categories function



function delete_categories(){
	global $connect;

	//delete a category
	if (isset($_GET["delete"])) {
	    $the_cat_id = $_GET['delete'];
	$query = "DELETE FROM categories WHERE cat_id = {$the_cat_id}";
	$delet_query = mysqli_query($connect, $query);
	header("Location: categories.php");
	}
	}//delte_categories


function list_all_posts(){

	global $connect;

	    $query = "SELECT * FROM posts INNER JOIN categories ON posts.post_category_id = categories.cat_id";
	    $select_posts = mysqli_query($connect, $query);

	    while ($row = mysqli_fetch_assoc($select_posts)) {
	        $post_id = $row['post_id'];
	        $post_author = $row['post_author'];
	        $post_title = $row['post_title'];
	        $post_category = $row['cat_title'];
	        $post_status = $row['post_status'];
	        $post_image = $row['post_image'];
	        $post_tags = $row['post_tags'];
	        $post_comments = $row['post_comment_count'];
	        $post_date = $row['post_date'];

	        echo " <tr><td align='center'>$post_id</td>
	               <td>$post_author</td>
	               <td>$post_title</td>
	               <td>$post_category</td>
	               <td>$post_status</td>
	               <td><img src='../img/$post_image' alt='post-img' height='50'></td>
	               <td>$post_tags</td>
	               <td>$post_comments</td>
	               <td>$post_date</td>
	               </tr>";
	    }
}//list_all_posts

 ?>
