
<section class="copyright-footer">
	<div class="container">
		<div class="copyright col-md-6">Copyright C 2016, The php blog magazine. All rights reserved.</div>
		<div class="col-md-6">
			<ul>
				<li><a href="#">About</a></li>
				<li><a href="#">Contact</a></li>
				<li><a href="#">Impressum</a></li>
				<li><a href="#">Media</a></li>
			</ul>
		</div>
	</div>
</section><!-- most-popular-post-section -->




<!-- Include js plugin -->
<script src="js/owl.carousel.js"></script>

    <script>
    $(document).ready(function() {

      $("#owl-demo").owlCarousel({
        items : 3,
        lazyLoad : true,
        scrollPerPage: true
        // responsive: false
      });

    });
    </script>

    <script>
	    $(document).ready(function() {
	      
		$("#owl-bot").owlCarousel({
		    items : 4,
		    lazyLoad : true,
        	scrollPerPage: true,
        	navigation : true,
        	pagination: false
		  });

	    });
    </script>



<!-- Include js plugin end-->


	<!-- bootstrap implimentation -->
	<script src="js/bootstrap.min.js"></script>
	<!-- bootstrap imp end -->
	<script src="js/navbar.js"></script>

</body>
</html>