<?php

/**
 * Get excerpt from string
 * 
 * @param String $str String to get an excerpt from
 * @param Integer $startPos Position int string to start excerpt from
 * @param Integer $maxLength Maximum length the excerpt may be
 * @return String excerpt
 */
function getExcerpt($str, $startPos=0, $maxLength=100) {
	if(strlen($str) > $maxLength) {
		$excerpt   = substr($str, $startPos, $maxLength-3);
		$lastSpace = strrpos($excerpt, ' ');
		$excerpt   = substr($excerpt, 0, $lastSpace);
		$excerpt  .= '...';
	} else {
		$excerpt = $str;
	}
	
	return $excerpt;
}

function post_counter(){

	global $connect;

		$query = "SELECT * FROM posts";
		$select_posts = mysqli_query($connect, $query);
		$row = mysqli_fetch_assoc($select_posts);
		$post_id = $row['post_id'];

	if (isset($_GET["single.php?p_id=$post_id"])) {
		$post_counter = $_GET["post_id"];
        $query = "UPDATE posts SET counter = counter + 1 WHERE p_id = $post_id";
if (!$update_post_comment_count) {
              die("query faild " . mysqli_error($connect));
            }
		$counter_query = mysqli_query($connect, $query);
	}


}

