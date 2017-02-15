<?php// include 'includes/db.php'; ?>
<?php include 'header.php'; ?>


<section class="featured-post-small">
		<div class="container">
			<div id="owl-demo" class="owl-carousel">
				<div class="feauterd-post-container lazyOwl">
				<div class="image-of-featured-post"><img data-src="http://placehold.it/140x69" src="http://placehold.it/140x69" alt="fetured-post"></div>
				<div class="descrition-of-featured-post"><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the </p></div>
				</div>

				<div class="feauterd-post-container lazyOwl">
				<div class="image-of-featured-post "><img data-src="http://placehold.it/140x69" src="http://placehold.it/140x69" alt="fetured-post"></div>
				<div class="descrition-of-featured-post "><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the </p></div>
				</div>

				<div class="feauterd-post-container lazyOwl">
				<div class="image-of-featured-post "><img data-src="http://placehold.it/140x69" src="http://placehold.it/140x69" alt="fetured-post"></div>
				<div class="descrition-of-featured-post"><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the </p></div>
				</div>

				<div class="feauterd-post-container lazyOwl">
				<div class="image-of-featured-post "><img data-src="http://placehold.it/140x69" src="http://placehold.it/140x69" alt="fetured-post"></div>
				<div class="descrition-of-featured-post"><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the </p></div>
				</div>

				<div class="feauterd-post-container lazyOwl">
				<div class="image-of-featured-post "><img data-src="http://placehold.it/140x69" src="http://placehold.it/140x69" alt="fetured-post"></div>
				<div class="descrition-of-featured-post"><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the </p></div>
				</div>
			</div>

		</div>
</section><!-- feautered-post -->


<section>
		<div class="container">
			<div class="feauterd-post-big-container col-md-4">
			<div class="category-featured-post-big">Travel</div>
			<div class="image-of-featured-post-big"><img src="http://placehold.it/352x320" alt="fetured-post"></div>
			<div class="descrition-of-featured-post-big"><p>Lorem Ipsum is simply dummy text of the printing and typesetting</p></div>
			<div class="autor-name-and-date-fetured-post-big"><p><span>Name Surname</span>  -  6 months ago</p></div>
			</div>


			<div class="feauterd-post-big-container col-md-4">
			<div class="category-featured-post-big">Travel</div>
			<div class="image-of-featured-post-big"><img src="http://placehold.it/352x320" alt="fetured-post"></div>
			<div class="descrition-of-featured-post-big"><p>Lorem Ipsum is simply dummy text of the printing and typesetting</p></div>
			<div class="autor-name-and-date-fetured-post-big"><p><span>Name Surname</span>  -  6 months ago</p></div>
			</div>

			<div class="feauterd-post-big-container col-md-4">
			<div class="category-featured-post-big">Travel</div>
			<div class="image-of-featured-post-big"><img src="http://placehold.it/352x320" alt="fetured-post"></div>
			<div class="descrition-of-featured-post-big"><p>Lorem Ipsum is simply dummy text of the printing and typesetting</p></div>
			<div class="autor-name-and-date-fetured-post-big"><p><span>Name Surname</span>  -  6 months ago</p></div>
			</div>
		</div>
</section><!-- feuterd-post-big -->

<div class="container"><div class="seperator"></div></div>

<section>
	<div class="container">
		<div class="col-md-4">
			<div class="promo-box" style="background-image:url(http://placehold.it/348x214)">
				<div class="promo-box-inside">
					<p>Learn More</p>
					<h2>About Myself</h2>
				</div>
				<a href="#" class="promo-box-link"></a>
			</div>
		</div>

		<div class="col-md-4">
			<div class="promo-box" style="background-image:url(http://placehold.it/348x214)">
				<div class="promo-box-inside">
					<p>Learn More</p>
					<h2>About Myself</h2>
				</div>
				<a href="#" class="promo-box-link"></a>
			</div>
		</div>

		<div class="col-md-4">
			<div class="promo-box" style="background-image:url(http://placehold.it/348x214)">
				<div class="promo-box-inside">
					<p>Learn More</p>
					<h2>About Myself</h2>
				</div>
				<a href="#" class="promo-box-link"></a>
			</div>
		</div>

	</div>
</section> <!-- promo-box -->

<section>
	<div class="container">
		<section class="content col-md-8">

		<?php 
			$query = "SELECT * FROM posts";

			$select_the_post_title = mysqli_query($connect, $query);

			while($row = mysqli_fetch_assoc($select_the_post_title))
						{
							$post_title = $row['post_title'];
							$post_author = $row['post_author'];
							$post_date = $row['post_date'];
							$post_image = $row['post_image'];
							$post_content = $row['post_content'];
							$post_tags = $row['post_tags'];
							$post_comment_count = $row['post_comment_count'];
						
							?>
			<div class="big-post">
				<div class="section-title">
					<h3><a href="#">Travel</a></h3>
					<div class="seperator"></div>
				</div>

				<div class="big-post-title">
					<img src="<?php echo $post_image ?>" alt="big post image" class="img-responsive img-thumbnail">
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
				<button class="btn continue-reading" type="submit"><a href="#">Continue Reading</a></button>

			</div><!-- big-post -->

			<div class="section-title">
				<h3><a href="#">Related posts</a></h3>
				<div class="seperator"></div>
			</div>

			<div class="related-post col-md-12 no-padding-left no-padding-right">
			<div class="col-md-3 no-padding-left">
				<img src="http://placehold.it/167x90" alt="related post image">
				<div class="related-post-info">
					<div class="category col-md-6 no-padding-left no-padding-right"><i class="fa fa-bookmark"></i><p> Travel</p></div>
					<div class="date col-md-6 float-right no-padding-left no-padding-right"><i class="fa fa-calendar"></i><p> 11.01.2016</p></div>
					<p class="related-post-excerpt">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
				</div>
			</div>
			<div class="col-md-3 no-padding-left">
				<img src="http://placehold.it/167x90" alt="related post image">
				<div class="related-post-info">
					<div class="category col-md-6 no-padding-left no-padding-right"><i class="fa fa-bookmark"></i><p> Travel</p></div>
					<div class="date col-md-6 float-right no-padding-left no-padding-right"><i class="fa fa-calendar"></i><p> 11.01.2016</p></div>
					<p class="related-post-excerpt">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
				</div>
			</div>
			<div class="col-md-3 no-padding-left">
				<img src="http://placehold.it/167x90" alt="related post image">
				<div class="related-post-info">
					<div class="category col-md-6 no-padding-left no-padding-right"><i class="fa fa-bookmark"></i><p> Travel</p></div>
					<div class="date col-md-6 float-right no-padding-left no-padding-right"><i class="fa fa-calendar"></i><p> 11.01.2016</p></div>
					<p class="related-post-excerpt">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
				</div>
			</div>
			<div class="col-md-3 no-padding-left">
				<img src="http://placehold.it/167x90" alt="related post image">
				<div class="related-post-info">
					<div class="category col-md-6 no-padding-left no-padding-right"><i class="fa fa-bookmark"></i><p> Travel</p></div>
					<div class="date col-md-6 float-right no-padding-left no-padding-right"><i class="fa fa-calendar"></i><p>  11.01.2016</p></div>
					<p class="related-post-excerpt">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
				</div>
			</div>
			</div>

		
<?php
}
		?>
		</section> <!-- content -->
		<!-- Sidebar -->
		<?php include "aside.php" ?>

	</div> <!-- main container -->

	<section class="most-popular-post-section">
		<div class="container">
			<div class="section-title">
				<h3><a href="#">Most resent posts</a></h3>
				<div class="seperator"></div>
			</div>

			<div class="popular-posts">
				<div class="container no-padding-left">
					<div id="owl-bot" class="owl-carousel">
						<div class="lazyOwl">
							<div class="col-four">
								<img src="http://placehold.it/267x155" alt="popular posts image">
								<p>Lorem Ipsum is simply dummy text of theprinting and typesetting </p>
								<div class="category col-md-6 no-padding-left no-padding-right"><i class="fa fa-bookmark"></i><p> Travel</p></div>
								<div class="date float-right no-padding-left no-padding-right"><i class="fa fa-calendar"></i><p>  11.01.2016</p></div>
							</div>
						</div>
						<div class="lazyOwl">
							<div class="col-four">
								<img src="http://placehold.it/267x155" alt="popular posts image">
								<p>Lorem Ipsum is simply dummy text of theprinting and typesetting </p>
								<div class="category col-md-6 no-padding-left no-padding-right"><i class="fa fa-bookmark"></i><p> Travel</p></div>
								<div class="date float-right no-padding-left no-padding-right"><i class="fa fa-calendar"></i><p>  11.01.2016</p></div>
							</div>
						</div>
						<div class="lazyOwl">
							<div class="col-four">
								<img src="http://placehold.it/267x155" alt="popular posts image">
								<p>Lorem Ipsum is simply dummy text of theprinting and typesetting </p>
								<div class="category col-md-6 no-padding-left no-padding-right"><i class="fa fa-bookmark"></i><p> Travel</p></div>
								<div class="date float-right no-padding-left no-padding-right"><i class="fa fa-calendar"></i><p>  11.01.2016</p></div>
							</div>
						</div>
						<div class="lazyOwl">
							<div class="col-four">
								<img src="http://placehold.it/267x155" alt="popular posts image">
								<p>Lorem Ipsum is simply dummy text of theprinting and typesetting </p>
								<div class="category col-md-6 no-padding-left no-padding-right"><i class="fa fa-bookmark"></i><p> Travel</p></div>
								<div class="date float-right no-padding-left no-padding-right"><i class="fa fa-calendar"></i><p>  11.01.2016</p></div>
							</div>
						</div>
						<div class="lazyOwl">
							<div class="col-four">
								<img src="http://placehold.it/267x155" alt="popular posts image">
								<p>Lorem Ipsum is simply dummy text of theprinting and typesetting </p>
								<div class="category col-md-6 no-padding-left no-padding-right"><i class="fa fa-bookmark"></i><p> Travel</p></div>
								<div class="date float-right no-padding-left no-padding-right"><i class="fa fa-calendar"></i><p>  11.01.2016</p></div>
							</div>
						</div>
						<div class="lazyOwl">
							<div class="col-four">
								<img src="http://placehold.it/267x155" alt="popular posts image">
								<p>Lorem Ipsum is simply dummy text of theprinting and typesetting </p>
								<div class="category col-md-6 no-padding-left no-padding-right"><i class="fa fa-bookmark"></i><p> Travel</p></div>
								<div class="date float-right no-padding-left no-padding-right"><i class="fa fa-calendar"></i><p>  11.01.2016</p></div>
							</div>
						</div>
					</div>
				</div>
			</div><!-- popular-posts -->
		</div>
	</section><!-- most-popular-post-section -->

</section><!-- content -->

<?php include 'footer.php'; ?>