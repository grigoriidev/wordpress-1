<div class="page-header">
	<h1 class="entry-title" itemprop="name">
		<?php echo apply_filters('kadence_page_title', kadence_title() ); ?>
	</h1>
<div id="mobile_hidden" style="text-align: right; margin-bottom: 8px; margin-top: -60px;"><a target="_blank" href="https://www.facebook.com/Totally-Tent-Party-Rental-149204391477/"><img src="http://totallytent.com/wp-content/uploads/2016/01/facebook.png" style="width: 45px; margin-right: 20px; margin-top: 5px; height: auto;"></a><a target="_blank" href="https://plus.google.com/101644983888956406134/about"><img src="http://totallytent.com/wp-content/uploads/2016/01/google.png" style="margin-right: 20px; width: 45px; height: auto; margin-top: 5px;"></a><a target="_blank" href="https://twitter.com/renttotallytent"><img src="http://totallytent.com/wp-content/uploads/2016/01/twitter.png" style="margin-right: 20px; width: 45px; height: auto; margin-top: 5px;"></a><a target="_blank" href="https://www.pinterest.com/totallytent"><img src="http://totallytent.com/wp-content/uploads/2016/01/pinterest.png" style="margin-right: 20px; width: 45px; height: auto; margin-top: 5px;"></a><a target="_blank" href="https://www.instagram.com/totallytent"><img src="http://totallytent.com/wp-content/uploads/2016/01/instagram.png" style="margin-right: 20px; width: 45px; height: auto; margin-top: 5px;"></a><a target="_blank" href="https://www.youtube.com/user/totallytent"><img src="http://totallytent.com/wp-content/uploads/2016/01/youtube.png" style="margin-right: 10px; width: 45px; height: auto; margin-top: 5px;"></a></div>
   	<?php global $post; 
  	if(is_page()) {
  		$bsub = get_post_meta( $post->ID, '_kad_subtitle', true );
  		if(!empty($bsub)){
  			echo '<p class="subtitle"> '.$bsub.' </p>';
  		} 
	} else if(is_category()) { 
   		echo '<p class="subtitle">'.category_description().' </p>';
   	} ?>
</div>