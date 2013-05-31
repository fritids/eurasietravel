<?php 

/*
	Template Name: Countries Page
*/ 

?>

<?php get_header(); ?>

<?php include 'includes/headers-otherpage.php' ?>

<!--Other Page-->
<div id="otherpage">
    <div class="inner-wrap">
    
    	<!--Col 1-->
        <?php 
			$country_name = get_post_meta($post->ID, 'o_country_select', 23231);
			$featured = 'Featured';
			
			if ($country_name == 'Group Tours') :
				get_sidebar('grouptours');
			else:
				get_sidebar();
			endif;
		?>
        <!--End Col 1-->
        
        <!--Col 1-->
        <div id="c2">       	
            
        	<?php 
				/*$query_countries = trim($_POST['tour_country']);
				if($query_countries == ''){
					$query_countries = $_GET['c'];
					if ($query_countries == '') $query_countries = $country_name;
				}*/
				
				query_posts("showposts=5&post_type=tours&tour_top=$country_name");				
				
				remove_filter ('the_content', 'wpautop');
			?>
        	
            <!--Country Feature-->
            <div class="country-feature">
        			<ul class="cycle-page">
                    	
                    	<?php
					  	if (have_posts()) : while(have_posts()) : the_post();
						?>
						
						<?php	include 'includes/variables.php'; ?>
                        
                        <?php
							// get first image from list of images
							$sliderimages = get_post_meta($post->ID, 'images_value', true); 
							if ($sliderimages) {
								$arr_sliderimages = explode("\n", $sliderimages);
							} else {
								$arr_sliderimages = get_gallery_images();
							}
							
							$resized = timthumb(274, 590, $arr_sliderimages[0], 1);
							$permalink = get_permalink($post->ID);
							
						?>
                        <li class="sliderImage">
                        <a href="<?php echo $permalink.'&c='.$country_name; ?>"><img alt="<?php echo $tourcode; ?>" src="<?php echo $resized ?>" /></a>
                        <span class="bottom"><strong><?php the_title(); ?></strong><br />Destination: <?php limit_word($tourarea, 32); ?></span>                        </li>
                        <?php 
						endwhile; 
						
						else:
						?>
						<li class="noslidetour">Sorry, This tours program for this country will coming soon!</li>
                        <?php 
						endif; wp_reset_query(); 
						?>
                        
                    </ul>
            </div>
            <!--End Country Feature-->        	
        	
        <!--Top Destination-->
            <div id="top-destination">
            	<?php
					$top_destination = 'Top Destination'; 
					query_posts("showposts=6&post_type=tours&tour_top=$country_name");				
					
					remove_filter ('the_content', 'wpautop');					
				?>
                
            	<h2 class="purple radius"><strong>6 Top</strong> Destination</h2>
                <ul>
                <?php
					if (have_posts()) : while(have_posts()) : the_post();
					?>
					
					<?php	include 'includes/variables.php'; ?>
					
					<?php
						// get first image from list of images
						$sliderimages = get_post_meta($post->ID, 'images_value', true); 
						if ($sliderimages) {
							$arr_sliderimages = explode("\n", $sliderimages);
						} else {
							$arr_sliderimages = get_gallery_images();
						}
						
						$resized = timthumb(119, 173, $arr_sliderimages[0], 1);
						$permalink = get_permalink($post->ID);
						
					?>
                
                	<li>
                    <a href="<?php echo $permalink.'&c='.$country_name; ?>"><img alt="<?php echo $tourcode; ?>" src="<?php echo $resized ?>" class="border" /></a><br />
                    <a href="<?php echo $permalink.'&c='.$country_name; ?>" title="Destination: <?php the_title(); ?>"><?php limit_word(get_the_title(), 20); ?></a>
					</li>
                    <?php 
					endwhile;
					
					else: 
					?>
                    
                    <li class="nodata">Sorry, This coutnry tours program will coming soon!</li>
					
					<?php
					endif; wp_reset_query(); 
					?>
                    <div class="clear"></div>
                </ul>
            </div>
            <!-- End Top Destination-->
            
            <!--Tour Package-->
            <div id="tour-package">
            	<h2 class="purple radius"><strong>Tour Pacakge</strong> in <?php echo $country_name; ?></h2>                
                
                	<?php
						$metakey = 'minprice_value';
						$orderby = 'name';
						$order = 'ASC';
						
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
					
					 
					  /*$cat_amount = 0;
					  $tour_type_cats=  get_categories('taxonomy=tour_type&order_by=name'); 
					  foreach ($tour_type_cats as $category) {
						$tour_type_name = $category->category_nicename;
						$option = $category->cat_name;*/						
					?>	
                    <div class="tour-type-items">
                    <ul>
                    	<?php 
							if($country_name !=='') {
								$query = "SELECT p.* FROM $wpdb->posts p, $wpdb->postmeta p1
										WHERE p.ID = p1.post_id AND p1.meta_key ='tourcountry_value' AND p1.meta_value ='$country_name'";
								$tc = getIDs($query);								
								$_ids = $tc;
							}
							
							$wpq = array ('post_type' => 'tours', 'meta_key' => $metakey, 'orderby' => $orderby, 'order' => $order, 'post__in' => $_ids, 'post_status' => 'publish', 'posts_per_page' => 18);
														
							$tourlisting = new WP_Query($wpq);
							
							
							if($tourlisting->have_posts()) : while($tourlisting->have_posts()) : $tourlisting->the_post();	
						?>	                        
                        <?php	include 'includes/variables.php'; ?>
                        <?php $permalink = get_permalink($post->ID); ?>
                        <li>
                        
                        <div class="tour-name"><a href="<?php echo $permalink.'&c='.$country_name; ?>" title="Destination: <?php echo $tourarea; ?>"><?php the_title(); ?></a></div>
                        
                        <div class="trip-prices">
							<?php echo format_listing_price($tourminiprice); ?>
                        </div>
                        
						</li>
                        <?php endwhile; 
						else: ?>
						<li class="nodata">Sorry, This coutnry tours program will coming soon!</li>
                        <?php
						endif; ?>
                        
                    </ul>
                    </div>
                    <?php 
                        //$cat_amount ++;
                        //if ($cat_amount == 3) break;
                    //} 
                    ?>
                    
                    <?php
						if ($country_name == 'Cambodia') {
							$countrytours = '367';
						}
						if ($country_name == 'Vietnam') {
							$countrytours = '616';
						}
						if ($country_name == 'Laos') {
							$countrytours = '636';
						}
						if ($country_name == 'Myanmar') {
							$countrytours = '657';
						}
						if ($country_name == 'Thailand') {
							$countrytours = '2891';
						}
						if ($country_name == 'Group Tours') {
							$countrytours = '2931';
						}
					?>
                    <a class="more-tours" href="<?php bloginfo('url'); ?>/?page_id=<?php echo $countrytours; ?>&c=<?php echo $country_name; ?>" title="Find out more tours package">More Tours</a>
                
          </div>
            <!--End tour package-->
            
        </div>
        <!--End Col 2-->
        
    </div>
    <!--End Wrap-->
</div>    
<!--End Other Page-->

<?php get_footer(); ?>