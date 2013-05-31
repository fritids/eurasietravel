<?php 

/*
	 Countries Page
*/ 

?>

<?php get_header(); ?>

<?php include 'includes/headers-otherpage.php' ?>

<!--Other Page-->
<div id="otherpage">
    <div class="inner-wrap">
    
    	<!--Col 1-->
        <?php get_sidebar(); ?>
        <!--End Col 1-->
        
        <!--Col 1-->
        <div id="c2">       	
            
        	<?php 
				$country_name = get_post_meta($post->ID, 'o_country_select', 23231);
				$featured = 'Featured';
				
				/*$query_countries = trim($_POST['tour_country']);
				if($query_countries == ''){
					$query_countries = $_GET['c'];
					if ($query_countries == '') $query_countries = $country_name;
				}*/
				
				query_posts("showposts=5&post_type=tours&tour_misc=$featured&countries_destination=$country_name");				
				
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
						endwhile; endif; wp_reset_query(); 
						?>
                        
                    </ul>
            </div>
            <!--End Country Feature-->        	
        	
        <!--Top Destination-->
            <div id="top-destination">
            	<?php
					$top_destination = 'Top Destination'; 
					query_posts("showposts=3&post_type=tours&tour_misc=$top_destination&countries_destination=$country_name");				
					
					remove_filter ('the_content', 'wpautop');
				?>
                
            	<h2 class="purple radius"><strong>3 Top</strong> Destination</h2>
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
                    <a href="<?php echo $permalink.'&c='.$country_name; ?>" title="Destination: <?php the_title(); ?>"><?php limit_word(get_the_title(), 26); ?></a>
					</li>
                    <?php 
					endwhile; endif; wp_reset_query(); 
					?>
                    <div class="clear"></div>
                </ul>
            </div>
            <!-- End Top Destination-->
            
            <!--Tour Package-->
            <div id="tour-package">
            	<h2 class="purple radius"><strong>Tour Pacakge</strong> in <?php echo $country_name; ?></h2>                
                
                	<?php 
					  $cat_amount = 0;
					  $tour_type_cats=  get_categories('taxonomy=tour_type&order_by=name'); 
					  foreach ($tour_type_cats as $category) {
						$tour_type_name = $category->category_nicename;
						$option = $category->cat_name;						
					?>	
                    <div class="tour-type-items">
                    <?php if($option == 'Adventure'){ ?>                    
                    
                    <img src="<?php bloginfo('template_url'); ?>/scripts/timthumb.php?src=<?php echo get_option_tree('img_advanture_tour', '', false); ?>&w=168&h=110&zc=1&amp;q=90" class="border" />
                    
                    <?php }elseif($option == 'Cruise') {?>
                    
                    <img src="<?php bloginfo('template_url'); ?>/scripts/timthumb.php?src=<?php echo get_option_tree('img_cruise_tour', '', false); ?>&w=168&h=110&zc=1&amp;q=90" class="border" />
                    
                    <?php }elseif($option == 'Honeymoon') {?>
                    
                    <img src="<?php bloginfo('template_url'); ?>/scripts/timthumb.php?src=<?php echo get_option_tree('img_honeymoon_tour', '', false); ?>&w=168&h=110&zc=1&amp;q=90" class="border" />
                    
                    <?php } ?>
                    <div class="tour-short-info">
                    <a href="#" class="tour-type-name"><?php echo $option; ?></a>
                    <ul>
                    	<?php 
							query_posts("posts_per_page=3&post_type=tours&tour_type=$option&countries_destination=$country_name");
							if (have_posts()) : while(have_posts()) : the_post();	
						?>	                        
                        <?php	include 'includes/variables.php'; ?>
                        <?php $permalink = get_permalink($post->ID); ?>
                        <li><span class="tour-name"><a href="<?php echo $permalink.'&c='.$country_name; ?>" title="Destination: <?php echo $tourarea; ?>"><?php the_title(); ?></a></span><span class="prices">USD <?php echo $tourminiprice; ?></span></li>
                        <?php endwhile; endif; wp_reset_query(); ?>
                        
                    </ul>
                    </div>
                    <div class="clear"></div>                    
                    </div>
                    <?php 
                        $cat_amount ++;
                        //if ($cat_amount == 3) break;
                    } 
                    ?>
                    <a class="more-tours" href="#">More Pacakges</a>
                
          </div>
            <!--End tour package-->
            
        </div>
        <!--End Col 2-->
        
    </div>
    <!--End Wrap-->
</div>    
<!--End Other Page-->

<?php get_footer(); ?>