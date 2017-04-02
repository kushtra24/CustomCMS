<?php// include 'includes/db.php'; ?>
<?php include 'includes/header.php'; ?>

<section>
		<div class="container">
		<?php

			if (isset($_GET['c_id'])) {
				$category_id = $_GET['c_id'];
		$query = "SELECT * FROM `posts` INNER JOIN categories ON posts.post_category_id = categories.cat_id WHERE cat_id = $category_id";

			$select_the_post_title = mysqli_query($connect, $query);

			while($row = mysqli_fetch_assoc($select_the_post_title))
						{
							$post_id = $row['post_id'];
							$post_title = $row['post_title'];
							$post_author = $row['post_author'];
							$post_date = $row['post_date'];
							$post_image = $row['post_image'];
							$cat_title = $row['cat_title'];
							?>
			<div class="feauterd-post-big-container col-md-4">
			<div class="category-featured-post-big"><?php echo $cat_title ?></div>
			<div class="image-of-featured-post-big"><img src="admin/img/<?php echo $post_image ?>" alt="fetured-post" width="350" height="200" class="responsive-img"></div>
			<div class="descrition-of-featured-post-big"><a href="single.php?p_id=<?php echo $post_id ?>"><p><?php echo $post_title ?></p></a></div>
			<div class="autor-name-and-date-fetured-post-big"><p><span><?php echo $post_author ?></span>  -  <?php echo $post_date ?></p></div>
			</div>
<?php 
}//end of the while loop
}//end of the GET request
 ?>
			
		</div>
</section><!-- feuterd-post-big -->


<?php include 'includes/footer.php'; ?>