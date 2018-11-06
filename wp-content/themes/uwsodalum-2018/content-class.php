<?php
	function text_cut($text, $length = 27, $dots = true) {   
		global $post;
		$parent = get_post($post->post_parent);
		$text = $parent->post_title;
		$text = trim(preg_replace('#[\s\n\r\t]{2,}#', ' ', $text));    
		$text_temp = $text;    
		while (substr($text, $length, 1) != " ") {
			$length--; 
			if ($length > strlen($text)) { break; }
		}     
		$text = substr($text, 0, $length);     
		return $text . ( ( $dots == true && $text != '' && strlen($text_temp) > $length ) ? '...' : ''); 
	}
?>

<?php the_content(); ?>

