<?php 

/*
	Template Name: Search Hotel Results
*/ 

?>

<?php get_header(); ?>

<!-- This header is use for all page, exclude homepage -->
<?php include 'includes/headers-otherpage.php' ?>

<!--Other Page-->
<div id="otherpage">
    <div class="inner-wrap">
    
    	<!--Col 1-->
        <?php get_sidebar('hotelsearch'); ?>
        <!--End Col 1-->
        
        <!--Col 1-->
        <div id="c2">
            <h2 class="dark-gray">Search Hotel Result</h2>
			
            <?php include 'includes/search_hotel_query.php'; ?>            
            
            <?php 
            	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
											
				query_posts($wpq);
				
				if(have_posts()) : while(have_posts()) : the_post(); ?>  
            
            <div class="short-area">
            <ul>
            <li>Show by area:</li>
            <?php 
				$countryname = $_GET['c'];
				$country_id = '';
				
				if($countryname == 'Cambodia') { 
					$country_id = 3;
				} elseif($countryname == 'Vietnam') {
					$country_id = 21;
				} elseif($countryname == 'Laos') {
					$country_id = 22;
				} elseif($countryname == 'Myanmar') {
					$country_id = 23;
				} elseif($countryname == 'Thailand') {
					$country_id = 130;
				} 
			
				$args = array(
				  'taxonomy'     => 'hotel_countries',
				  'orderby'      => 'title',
				  'order' 		 => 'ASC', // DESC or ASC
				  'child_of'	 => $country_id,
				  'hierarchical' => 1,
				  'hide_empty'   => 1	  
				);			
				$categories=  get_categories($args); 
				foreach ($categories as $category) {
					$people_category = $category->category_nicename;
					$areaname = $category->cat_name;								
			?>
            	<li><a href="?page_id=260&qhotelquery=h&c=<?php echo $countryname; ?>&qhotel_type=0&qhotel_area=<?php echo $areaname; ?>&qminprice_hotel=0&qmaxprice_hotel=9999"><?php echo $areaname; ?></a></li>
            <?php 	} //end foreach ?>
            </ul>
            
            </div>
            <!--/ short by area -->	
                
                <?php include 'includes/variables.php' ?>
                
                <?php 					                    
					// get first image from list of images
					$sliderimages = get_post_meta($post->ID, 'images_value', true); 
					if ($sliderimages) {
						$arr_sliderimages = explode("\n", $sliderimages);
					} else {
						$arr_sliderimages = get_gallery_images();
					}
					
					$resized = timthumb(114, 160, $arr_sliderimages[0], 1);
					$permalink = get_permalink($post->ID);
					
				?>
                
                <div class="hotel-result-items">
                    <h3><a href="<?php echo $permalink.'&c='.$hotelcountry; ?>"><?php the_title(); ?></a></h3>
                    <div class="hotel-level"><a href="#" class="<?php echo $hoteltype; ?>"><?php echo $hoteltype; ?></a></div>
                    <div class="clear"></div>
                    
                    <a href="<?php echo $permalink.'&c='.$hotelcountry; ?>"><img alt="<?php echo $tourcode; ?>" src="<?php echo $resized ?>" class="border" /></a>
                    <div class="hotel-items-info">                
                    <?php 
						$meta = get_post_meta(get_the_ID(), $custom_overview_metabox->get_the_id(), TRUE);
						echo '<p>';
						limit_word($meta['overview_hotel'], 310);
						echo '</p>';						
					?>                    
                    
                    <ul class="hotel-icons">
                        <li><img src="<?php bloginfo('template_url'); ?>/images/milestone.png" alt="area" /> <?php echo $hotelarea; ?></li>
                        <li><img src="<?php bloginfo('template_url'); ?>/images/cost.png" alt="room" /> <?php echo $hotelrooms; ?> rooms</li>
                        <li><img src="<?php bloginfo('template_url'); ?>/images/billing.png" alt="price" /> from $<?php echo $hotelminiprice; ?> room/night</li>
                    </ul>
                                    
                    </div>
                    <!--End Hotel items info-->
                    <div class="clear"></div>
                </div>
                <!--End Hotel Result Items-->
            
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