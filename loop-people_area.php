<?php	            	
	if (have_posts()) :  while (have_posts()) : the_post(); 			
	$image_id = get_post_thumbnail_id();  
	$image_url = wp_get_attachment_image_src($image_id, 'full');
?>  

<div class="our-people">
    <div class="photo">
        <?php $resized_thumb = timthumb(119, 90,  $image_url[0], 1); ?>
        <img src="<?php echo $resized_thumb; ?>" title="<?php the_title(); ?>" />                        
    </div>
    
    <div class="middle">
        <span class="name"><?php the_title(); ?></span>
        <span class="position"><?php echo get_post_meta($post->ID, "position_value", true); ?></span>
        <span class="email"><a href="mailto:<?php echo get_post_meta($post->ID, "emailaddress_value", true); ?>"><?php echo get_post_meta($post->ID, "emailaddress_value", true); ?></a></span>
    </div>

    <div class="bio">	                                                            
        <?php the_content(); ?>
    </div>
    <div class="clear"></div>
</div>


<?php endwhile; ?>

<?php if (function_exists('wp_pagenavi')) { ?>
<?php wp_pagenavi(); ?>
<?php } ?>

<?php else : ?>

 <h2>Not Found</h2>
 <p>Try using the search form the left</p>

<?php endif; 
    wp_reset_query();
?>

</div>
<!--End Tour Detail-->