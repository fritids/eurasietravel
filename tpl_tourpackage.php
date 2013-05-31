<?php 

/*
	Template Name: Tours Package
*/ 

?>

<?php get_header(); ?>

<!-- This header is use for all page, exclude homepage -->
<?php include 'includes/headers-otherpage.php' ?>

<!--Other Page-->
<div id="otherpage">
    <div class="inner-wrap">
    
    	<!--Col 1-->
        <?php 
			$metakey = 'minprice_value';
			$orderby = 'name';
			$order = 'desc'; //asc, desc
			$countryname = $_GET['c'];
				
			if ($countryname == 'Group Tours') :
				get_sidebar('grouptours');
			else:
				get_sidebar();
			endif;
		?>
        <!--End Col 1-->
        
        <!--Col 1-->
        <div id="c2">        	     
            <?php	
				
				$_ids = array();
				function getIds( $query ) {
					global $wpdb;
					
					$searchtours = $wpdb->get_results($query, ARRAY_A);
					if ( !empty ($searchtours) ) {
						foreach( $searchtours as $_post ) {
							$tmp[] = $_post['ID'];
						}
					}
				
					return $tmp;
				}
				
				global $wpdb;
				
			?>
                
                <h2 class="dark-gray">Tours Package in <?php echo $countryname; ?></h2>
                
            <?php 
			
				if($country_name !=='') {
					$query = "SELECT p.* FROM $wpdb->posts p, $wpdb->postmeta p1
							WHERE p.ID = p1.post_id AND p1.meta_key ='tourcountry_value' AND p1.meta_value ='$countryname'";
					$tc = getIDs($query);								
					$_ids = $tc;
				}
				
				$wpq = array ('post_type' => 'tours', 'meta_key' => $metakey, 'orderby' => $orderby, 'order' => $order, 'post__in' => $_ids, 'post_status' => 'publish', 'paged' => $paged, 'posts_per_page' => 5);
				
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
						limit_word($meta['tour_description'], 320);
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