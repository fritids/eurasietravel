<?php

/* 
Template Name: Our People
*/

?>

<?php get_header(); ?>

<!-- This header is use for all page, exclude homepage -->
<?php include 'includes/headers-otherpage.php' ?>

<!--Other Page-->
<div id="otherpage">
    <div class="inner-wrap">
    	
    	<!--Col 1-->
        <?php get_sidebar(); ?>
        <!--End Col 1-->
        
        <!--Col 1-->
        <div id="c2">
            <div class="page-detail"> 
            <h2>Our People</h2>
            
            <?php 			
					$categories=  get_categories('taxonomy=people_area'); 
			  	    foreach ($categories as $category) {
						$people_category = $category->category_nicename;
						$areaname = $category->cat_name;								
			?>
            <div class="peopleareaname">
            	<h3>In <?php echo $areaname; ?></h3> <span class="morearea"><a href="?people_area=<?php echo $category->slug; ?>">See more people &rsaquo;&rsaquo;</a></span>
            	<div class="clear"></div>
            </div>
                       
            <?php 
				query_posts("posts_per_page=1&post_type=people&people_area=$people_category&order=desc"); 
				
				if (have_posts()) : while(have_posts()) : the_post();
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
            <?php		endwhile; endif; wp_reset_query(); ?>
            <?php 	} //end foreach ?>
            </div>
            <!--End Tour Detail--> 
            
        </div>
        <!--End Col 2-->
        
    </div>
    <!--End Wrap-->
</div>    
<!--End Other Page-->

<?php get_footer(); ?>