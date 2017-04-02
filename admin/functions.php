<?php 


function confirm_query_is_working($result){
	global $connect;

            if (!$result) {
              die("query faild " . mysqli_error($connect));
            }
}


function add_categories(){

	global $connect;

	// check if the user pressed submit (add_category_cubmit) button
	if(isset($_POST['add_category_submit'])) {
		//Asign the category posting to a variable
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
	        confirm_query_is_working($create_category_query);
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
            <a href='categories.php?edit=$cat_id' class='edit_category' style='float: right; padding: 0 15px;' ><i class='fa fa-pencil-square-o' aria-hidden='true' style='color: orange;'></i></a>
            </td>
        </tr>
        ";// if the is_menu field on the database is true then mark the checkbox as checked
        }
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

	        echo "<tr><td align='center'>$post_id</td>
	               <td>$post_author</td>
	               <td>$post_title</td>
	               <td>$post_category</td>
	               <td>$post_status</td>
	               <td><img src='../admin/img/$post_image' alt='post-img' height='50'></td>
	               <td>$post_tags</td>
	               <td>$post_comments</td>
	               <td>$post_date</td>
	               <td> <a href='all_posts.php?delete_post=$post_id'><i class='fa fa-times' aria-hidden='true' style='color: red;'></i> </a></td>
	               <td> <a href='all_posts.php?burimi=edit_posts&p_id={$post_id}' style='float: right; padding: 0 15px;' ><i class='fa fa-pencil-square-o' aria-hidden='true' style='color: orange;'></i></a> </td>
	               </tr>";
	    }
}//list_all_posts

function post_a_post(){

	global $connect;

	if (isset($_POST['add_for_submit'])) {
  
          $post_author = $_POST['post_author'];
          $post_title = $_POST['post_title'];
          $post_category = $_POST['post_category'];
          $post_status = $_POST['post_status'];
          $post_image = $_FILES['post_image']['name'];
          $post_image_temp = $_FILES['post_image'] ['tmp_name'];
          $post_tags = $_POST['post_tags'];
          $post_content = $_POST['post_content'];
          $post_date = date('d-m-y');
          $post_comment_count = 0;

          move_uploaded_file($post_image_temp, "img/$post_image");

          //query to insert the data to the database
            $query = "INSERT INTO posts(post_title, post_category_id, post_author,post_status, post_image, post_tags, post_content, post_date, post_comment_count)";
          $query .= "VALUES('{$post_title}', {$post_category}, '{$post_author}' ,'{$post_status}', '{$post_image}', '{$post_tags}', '{$post_content}', now(), {$post_comment_count})";

            $create_post_query = mysqli_query($connect, $query);
            confirm_query_is_working($create_post_query);
            echo "Success, your post is public";
}

}// post_a_post

function delete_posts(){
	global $connect;

	if (isset($_GET["delete_post"])) {
		$the_post_id = $_GET["delete_post"];
		$query = "DELETE FROM posts where post_id = {$the_post_id}";
		$delet_query = mysqli_query($connect, $query);
		header("Location: all_posts.php");
	}
}


function list_all_comments(){

	global $connect;

	    $query = "SELECT * FROM comments INNER JOIN posts ON comments.com_post_id = posts.post_id ORDER BY `comments`.`com_id` DESC";
	    $select_posts = mysqli_query($connect, $query);

	    confirm_query_is_working($select_posts);

	    while ($row = mysqli_fetch_assoc($select_posts)) {
	        $com_id = $row['com_id'];
	        $com_author = $row['com_author'];
	        $com_content = $row['com_content'];
	        $com_email = $row['com_email'];
	        $com_status = $row['com_status'];
	        $in_response_to = $row['post_title'];
	        $com_date = $row['com_date'];
	        $post_id = $row['post_id'];

	        echo "<tr><td align='center'>$com_id</td>
	               <td>$com_author</td>
	               <td>$com_content</td>
	               <td>$com_email</td>";
            if ($com_status == true) {
				echo "<td>Approved</td>";
			}else{ echo "<td>Awaiting Approval</td>";}
	        echo "<td><a href='../single.php?p_id=$post_id'>$in_response_to</a></td>
	               <td>$com_date</td>
	               <td> <a href='comments.php?approve_comment=$com_id'>Aprove</a></td>
	               <td> <a href='comments.php?disapprove_comment=$com_id'>Disaprove</a></td>
	                <td> <a href='comments.php?source=edit_comments&p_id={$com_id}' style='float: right; padding: 0 15px;' ><i class='fa fa-pencil-square-o' aria-hidden='true' style='color: orange;'></i></a> </td>
	               <td> <a href='comments.php?delete_comment=$com_id'><i class='fa fa-times' aria-hidden='true' style='color: red;'></i> </a></td>
	              
	               </tr>";
	    }
}//list_all_posts

function delete_comments(){

	global $connect;

	if (isset($_GET["delete_comment"])) {
		$the_comment_id = $_GET["delete_comment"];
		$query = "DELETE FROM comments where com_id = {$the_comment_id}";
		$delet_query = mysqli_query($connect, $query);
		header("Location: comments.php");
	}
}

function aprove_comments(){

	global $connect;

	if (isset($_GET["approve_comment"])) {
		$approve_the_comment = $_GET["approve_comment"];

        $query = "UPDATE comments SET com_status = true WHERE com_id = {$approve_the_comment}";
		$approve_comment_query = mysqli_query($connect, $query);
		confirm_query_is_working($approve_comment_query);
		echo "You've succesfully aproved a comment;";
		header("refresh:2;url=comments.php");

	}


}

function disaprove_comments(){

	global $connect;

	if (isset($_GET["disapprove_comment"])) {
		$disapprove_the_comment = $_GET["disapprove_comment"];
        $query = "UPDATE comments SET com_status = false WHERE com_id = {$disapprove_the_comment}";
		$disapprove_comment_query = mysqli_query($connect, $query);
		confirm_query_is_working($disapprove_comment_query);
		header("refresh:2;url=comments.php");
		echo "You've succesfully disaproved a comment;";
	}


}


function list_all_users(){

	global $connect;

	    $query = "SELECT * FROM users";
	    $select_users = mysqli_query($connect, $query);

	    confirm_query_is_working($select_users);

	    while ($row = mysqli_fetch_assoc($select_users)) {
	        $user_id = $row['user_id'];
	        $username = $row['username'];
	        $password = $row['password'];
	        $email = $row['email'];
	        $first_name = $row['first_name'];
	        $last_name = $row['last_name'];
	        $userimg = $row['user_img'];
	        $role = $row['role'];
	        $randsalt = $row['randsalt'];

	        echo "<tr>
	        	   <td align='center'>$user_id</td>
	               <td>$username</td>
	               <td>$password</td>
				   <td>$first_name</td>
	               <td>$last_name</td>
	               <td>$email</td>
	               <td><img src='../admin/img/$userimg' alt='user-img' height='50'></td>
	               <td>$role</td>
	               <td>$randsalt</td>
	               <td> <a href='users.php?source=edit_user&user_id=$user_id' style='float: right; padding: 0 15px;' ><i class='fa fa-pencil-square-o' aria-hidden='true' style='color: orange;'></i></a> </td>
	               <td> <a href='users.php?delete_user=$user_id'><i class='fa fa-times' aria-hidden='true' style='color: red;'></i> </a></td>
	               </tr>";
	    }
}//list_all_posts


function add_a_user(){
	global $connect;

	if (isset($_POST['add_user'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		$first_name = $_POST['first_name'];
		$Last_name = $_POST['last_name'];
		$email = $_POST['email'];
		$user_image = $_FILES['user_image']['name'];
		$user_image_temp = $_FILES['user_image'] ['tmp_name'];
		$role = $_POST['role'];

        move_uploaded_file($user_image_temp, "img/$user_image");

		$query = "INSERT INTO users(username, password, first_name, last_name, email, user_img, role) VALUES('{$username}', '{$password}', '{$first_name}', '{$Last_name}', '{$email}', '{$user_image}', '{$role}')";
		
		$add_a_user_query = mysqli_query($connect, $query);
		confirm_query_is_working($add_a_user_query);
		echo "Success, your post is public";

	}
}//add a user

function delete_user(){

	global $connect;

	if (isset($_GET["delete_user"])) {
		$the_user_id = $_GET["delete_user"];
		$query = "DELETE FROM users where user_id = {$the_user_id}";
		$delet_query = mysqli_query($connect, $query);
		header("Location: users.php");
	}
}//delete a user


