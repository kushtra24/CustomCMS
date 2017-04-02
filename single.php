<?php// include 'includes/db.php'; ?>
<?php include 'includes/header.php';
?>


<section>
	<div class="container">
		<section class="content col-md-8">

		<?php 

		if (isset($_GET['p_id'])) {
				$post_id = $_GET['p_id'];
            //query to edit the field in the database
            $query = "SELECT * FROM posts INNER JOIN categories ON posts.post_category_id = categories.cat_id WHERE post_id = $post_id";

			$select_the_post_specific_post = mysqli_query($connect, $query);
			while($row = mysqli_fetch_assoc($select_the_post_specific_post))
						{
							$post_title = $row['post_title'];
							$post_author = $row['post_author'];
							$post_date = $row['post_date'];
							$post_image = $row['post_image'];
							$post_content = $row['post_content'];
							$post_tags = $row['post_tags'];
							$post_comment_count = $row['post_comment_count'];
							
							$cat_title = $row['cat_title'];
							?>
			<div class="big-post">
				<div class="section-title">
					<h3><a href="#"><?php echo $cat_title ?></a></h3>
					<div class="seperator"></div>
				</div>

				<div class="big-post-title">
					<img src="admin/img/<?php echo $post_image ?>" alt="big post image" class="img-responsive img-thumbnail">
					<h3 class='big-post-title'><?php echo $post_title ?> </h3>
				</div>

				<div class="info-box">
					<div class="col-md-4 no-padding-left">
						<div class="autor-big-post">
							<img src="http://placehold.it/44x44" alt="autor-image">
							<p>by: <span><?php echo $post_author ?></span></p>
							<p><?php echo $post_date ?></p>
						</div>
					</div>
					<div class="col-md-3 no-padding-left">
						<div class="comments-big-post"><i class="fa fa-comments fa-3x"></i><p>Comments: <span><?php echo $post_comment_count ?></span></p></div>
					</div>
					<div class="col-md-2 no-padding-left">
						<div class="number-of-shares"><p>Share:</p><span>110</span></div>
					</div>
					<div class="col-md-3 no-padding-left no-padding-right">
						<div class="social-icons-share">
							<ul class="">
								<li><a href="#"><i class="fa fa-facebook-square fa-2x"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter-square fa-2x"></i></a></li>
								<li><a href="#"><i class="fa fa-behance-square fa-2x"></i></a></li>
								<li><a href="#"><i class="fa fa-youtube-square fa-2x"></i></a></li>
								<li><a href="#"><i class="fa fa-envelope-square fa-2x"></i></a></li>
							</ul>
						</div>
					</div>
				</div>

				<div class="big-post-excerpt">
					<p><?php echo $post_content ?></p>
				</div>
				<p class="post-tags"> <?php echo $post_tags ?></p>

				<div class="comment_single">
				<h3>Leave a comment</h3>
				<p>Writte your comment down, as soon as the admin aproves it It will show down below</p>
					<form action="" method="post">
					  <div class="form-group">
					    <input type="text" name="com_author" class="form-control" id="postAuthor" placeholder="Name" required>
					  </div>
					  <div class="form-group">
					    <input type="email" name="com_email" class="form-control" id="postStatus" placeholder="Email" required>
					  </div>
					  <div class="form-group">
					      <textarea name="com_content" class="form-control" rows="3" placeholder="Comment" required></textarea>
					  </div>
					  <button type="submit" class="btn btn-default" name="add_comment_submit">Submit</button>
					</form>
				</div>

			</div><!-- big-post -->	
<?php
}// end of while loop
?>

							<?php //post_a_comment(); 

	if (isset($_POST['add_comment_submit'])) {
  
          $Comment_author = $_POST['com_author'];
          $Comment_email = $_POST['com_email'];
          $comment_content = $_POST['com_content'];
          $comment_post_id = $post_id;
          $comment_date = date('d-m-y');
          $comment_status = "false";

          //query to insert the data to the database
            $query = "INSERT INTO comments(com_author, com_email, com_content, com_date, com_status, com_post_id) VALUES('{$Comment_author}', '{$Comment_email}', '{$comment_content}', now(), '{$comment_status}', $comment_post_id) ";

            $create_comment_query = mysqli_query($connect, $query);
            // confirm_query_is_working($create_comment_query);

            //check the query is working
            if (!$create_comment_query) {
              die("query faild " . mysqli_error($connect));
            }
            echo "Success, You've send your comment.";

            //update the number of post comments on the posts table.
		 $query_to_update_post_comments = "UPDATE posts SET post_comment_count = post_comment_count + 1 WHERE post_id=$post_id";
			$update_post_comment_count = mysqli_query($connect, $query_to_update_post_comments);

			if (!$update_post_comment_count) {
              die("query faild " . mysqli_error($connect));
            }

}// add comment
			
			//the query to selekt all comments
 			$query = "SELECT * FROM comments";

 			// myseqli query to connect to the database this is added to a variable.
			$select_the_post_specific_post = mysqli_query($connect, $query);
			// while loop to show all comments.
			while($row = mysqli_fetch_assoc($select_the_post_specific_post))
						{
							// get all rows from the database  to show them in the frontend
							$com_id = $row['com_post_id'];
							$com_author = $row['com_author'];
							$com_content = $row['com_content'];
							$com_date = $row['com_date'];
							$com_status = $row['com_status'];

							//check if the query is working
							if (!$select_the_post_specific_post) {
							              die("query faild " . mysqli_error($connect));
							            }

							if ($com_status == true && $post_id == $com_id) {
							?>

							<div class="comment-container">
								<img src="http://placehold.it/64x64">
                                <div>
                                    <strong><?php echo $com_author ?></strong>
                                    <span class="text-muted">
                                        <em><?php echo $com_date ?></em>
                                    </span>
                                </div>
                                <div><?php echo $com_content ?></div>
							</div>
							
							<?php
}// if is active and postid = to comid
}//end of while for show aproved comments
}// end of get request
?>

		</section> <!-- content -->

		<!-- Sidebar -->
		<?php include "includes/aside.php" ?>

	</div> <!-- main container -->
</section><!-- content -->

<?php include 'includes/footer.php'; ?>