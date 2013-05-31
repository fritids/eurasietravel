<?php 

/*
	Template Name: Search Tour Results
*/ 

?>

<?php get_header(); ?>

<!-- This header is use for all page, exclude homepage -->
<?php include 'includes/headers-otherpage.php' ?>

<!--Other Page-->
<div id="otherpage">
    <div class="inner-wrap">
    
    	<!--Col 1-->
        <?php get_sidebar('toursearch'); ?>
        <!--End Col 1-->
        
        <!--Col 1-->
        <div id="c2">
            <h2 class="dark-gray">Search Tour Result</h2>
            
			<?php include 'includes/search_tour_query.php'; ?>
            
            <?php 
            	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
											
				query_posts($wpq);
				
				if(have_posts()) : while(have_posts()) : the_post(); ?>  
            	
                <?php include 'includes/variables.php' ?>
                <div class="tour-result-items">
                
                <?php 					                    
					// get first image from list of images
					$sliderimages = get_post_meta($post->ID, 'images_value', true); 
					if ($sliderimages) {
						$arr_sliderimages = explode("\n", $sliderimages);
					} else {
						$arr_sliderimages = get_gallery_images();
					}
					
					$resized = timthumb(130, 180, $arr_sliderimages[0], 1);
					$permalink = get_permalink($post->ID);
					
				?>
                
                <a href="<?php echo $permalink.'&c='.$tourcountry; ?>"><img alt="<?php echo $tourcode; ?>" src="<?php echo $resized ?>" class="border" /></a>
                
                <div class="tour-info">
                	<div class="title">
	                    <h3><a href="<?php echo $permalink.'&c='.$tourcountry; ?>" title="<?php the_title(); ?>"><?php limit_word(get_the_title(), 25); ?></a></h3>
                        <span class="destination" title="<?php echo $tourarea; ?>"><strong>Destination: </strong><?php limit_word($tourarea, 32); ?></span>                    
                    </div>
                    <div class="tour-prices-items">
						<?php echo format_listing_price($tourminiprice) ?>                        
		    		</div>
                    <div class="clear"></div>
                    <?php 
						$meta = get_post_meta(get_the_ID(), $custom_desc_metabox->get_the_id(), TRUE);
						echo '<p>';
						limit_word($meta['tour_description'], 220);
						echo '</p>';
					?>
                    
                    
                    <a class="btn-more-detail" href="<?php echo $permalink.'&c='.$tourcountry; ?>">More Detail</a>
                    <div class="clear"></div>
                </div>
                
                <div class="clear"></div>
                	
                </div>
                <!--End Tour Result Items-->
            
            <?php endwhile ?>
            						
			<?php if (function_exists('wp_pagenavi')) { ?>
            <?php wp_pagenavi(); ?>
            <?php } ?>
			
	
			
			<?php else : ?>
            <div>
                   <p>Sorry, your search has found no matching results. Please try a different search.</p>
            </div>
			<?php endif; 
				wp_reset_query();
			?>
            
        </div>
        <!--End Col 2-->
        
    </div>
    <!--End Wrap-->
</div>    
<!--End Other Page-->

<?php get_footer(); ?>