<?php include 'includes/header.php';


if (isset($_POST['submit'])) {
$search = $_POST['search'];

$query = "SELECT * FROM posts WHERE post_tags LIKE  '%$search%'";

$serach_query = mysqli_query ($connect, $query);

if (!$serach_query) {
	die("Query faild" . mysqli_error($connection));
}

$count = mysqli_num_rows($serach_query);

if ($count == 0) {
	echo "Nothing found";
}
else
{
?>
<section>
		<div class="container">
		<?php
while($row = mysqli_fetch_assoc($serach_query))
						{
							$post_title = $row['post_title'];
							$post_author = $row['post_author'];
							$post_date = $row['post_date'];
							$post_image = $row['post_image'];
							$post_content = $row['post_content'];
							$post_tags = $row['post_tags'];
							$post_comment_count = $row['post_comment_count'];
						
							?>

			<div class="feauterd-post-big-container col-md-4">
			<div class="category-featured-post-big">Travel</div>
			<div class="image-of-featured-post-big"><img src="img/<?php echo $post_image ?>" alt="fetured-post" width="350" height="200" class="responsive-img"></div>
			<div class="descrition-of-featured-post-big"><p><?php echo $post_title ?></p></div>
			<div class="autor-name-and-date-fetured-post-big"><p><span><?php echo $post_author ?></span>  -  <?php echo $post_date ?></p></div>
			</div>
<?php } ?>
			
		</div>
</section><!-- feuterd-post-big -->

	<?php
}
}

?>



<?php include 'includes/footer.php'; ?>