<?php

/* 
Template Name: Embassy
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
            <?php $countryname = $_GET['c']; ?>
            <h2>Foreign Embassies in <?php echo $countryname; ?></h2>
            
            <?php
			
				$wpq = array ('post_type' => 'embassy', 'orderby' => 'title', 'order' => 'ASC', 'embassies_area' => $countryname, 'post_status' => 'publish', 'paged' => $paged, 'posts_per_page' => 6);
				
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
											
				query_posts($wpq);
			 
				//query_posts("posts_per_page=1&post_type=embassy&embassies_area=$countryname&order=desc"); 
				
				if (have_posts()) : while(have_posts()) : the_post();
				$image_id = get_post_thumbnail_id();  
				$image_url = wp_get_attachment_image_src($image_id, 'full');
				$resized = timthumb(13, 20, $image_url[0], 1);
			?>
            <div class="embassy-item">                
               	<h5><img src="<?php echo $resized ?>" title="<?php the_title(); ?>" /> <?php the_title(); ?></h5>
                <div class="embassy-info">
	            <?php the_content(); ?>
                </div>
            </div>    
            <!--/Embassy Item -->
    
            <?php		endwhile; ?> 
			
            <?php if (function_exists('wp_pagenavi')) { ?>
            <?php wp_pagenavi(); ?>
            <?php } ?>
			
            <?php else : ?>
            <div>
                   <p>Sorry, We will update all foreign embassies in <?php echo $countryname; ?> soon.</p>
            </div>
            
			<?php endif; wp_reset_query(); ?>

            </div>
            <!--End Tour Detail-->        
            
        </div>
        <!--End Col 2-->
        
    </div>
    <!--End Wrap-->
</div>    
<!--End Other Page-->

<?php get_footer(); ?>