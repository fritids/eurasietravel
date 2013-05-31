<?php get_header(); ?>

<div id="container">
    <div class="wrap">
    	
        <?php include 'includes/languages.php' ?>
        
        <!-- Logo container -->
        <div id="logo"><h1><a href="<?php echo get_option('home'); ?>/" title="Eurasie Travel">Eurasie Travel</a></h1></div>
        
        <!-- Slogan -->
        <div class="slogan">The best travel in Asian</div>
        
        <!-- Destination Tabs -->
        <div id="country-destination" class="usual"> 
            <ul class="tabs"> 
            <?php 								
				$countries_destination = get_option_tree('country_destination', '', false); 								
				$countries_destination = explode("\n", $countries_destination);
				$tab = 1;									
				foreach ($countries_destination as $item) {										
					echo '<li class="'.strtolower($item).'"><a href="#tab'.$tab.'">'.$item.'</a></li>'; 
					$tab++;
				}									
			?>
            </ul> 

            <?php
				$tab_items = 1;	
				$country_id = '';
				$short_name = '';
				$country_page = '';
				
				$country_arr = array('Cambodia', 'Vietnam', 'Laos', 'Myanmar', 'Thailand');
				
				foreach ($country_arr as $countrytab) {	
																		
					if($countrytab == 'Cambodia') { 
						$country_id = 3;
						$short_name = 'kh';
						$country_page = '50';
					} elseif($countrytab == 'Vietnam') {
						$country_id = 21;
						$short_name = 'vn';
						$country_page = '173';
					} elseif($countrytab == 'Laos') {
						$country_id = 22;
						$short_name = 'la';
						$country_page = '177';
					} elseif($countrytab == 'Myanmar') {
						$country_id = 23;
						$short_name = 'mm';
						$country_page = '180';
					} elseif($countrytab == 'Thailand') {
						$country_id = 130;
						$short_name = 'th';
						$country_page = '2888';
					} 
						
			?>
            <div id="tab<?php echo $tab_items; ?>"> 
				<?php 
                    query_posts("showposts=4&post_type=tours&tour_slider=$countrytab");
                    
                    remove_filter ('the_content', 'wpautop');
                ?>
                <div class="slider">
                    <div class="new-rabbon"><img src="<?php bloginfo('template_url'); ?>/images/home-new-tour.png" /></div>
                    <div class="nav"><a href="#" class="prev2">Prev</a> <span class="caption"></span><a href="#" class="next2">Next</a></div>
                    <ul class="cycle">
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
                            
                            $resized = timthumb(323, 910, $arr_sliderimages[0], 1);
                            $permalink = get_permalink($post->ID);
                            
                        ?>
                                    
                        <li class="sliderImage">
                        <a href="<?php echo $permalink.'&c='.$countrytab; ?>"><img alt="<?php echo $tourcode; ?>" src="<?php echo $resized ?>" /></a>
                        <span class="bottom"><strong><?php the_title(); ?></strong><br />Destination: <?php limit_word($tourarea, 122); ?></span>                        </li>
                        <?php 
                        endwhile; endif; wp_reset_query(); 
                        ?>                        
                    </ul>
                </div>
            <!-- End Silder -->       	
                
                
                
                <!-- Message of Cambodia -->
                <div class="about-counties">
                    <div class="eurasie-message">
                        <p>You can alway be there with Eurasie Travel to visit <br />
                        <span><?php echo $countrytab; ?>’s popular destinations</span> cover...</p>                         
                    </div>                
                    <div class="btn-coutnries"><a href="<?php bloginfo('url'); ?>/?page_id=<?php echo $country_page; ?>&c=<?php echo $countrytab; ?>" title="Find out more in Cambodia">About <strong><?php echo $countrytab; ?></strong></a></div>                
                </div>
                <!-- End Message of Cambodia -->
                
                <!-- Search in Cambodia -->
                <div class="search-home">
                    <ul>
                        <li><a class="selected" href="#destination-<?php echo $short_name; ?>">Find your destination</a></li>
                        <li><a href="#hotel-<?php echo $short_name; ?>">Find your hotel</a></li>                    
                    </ul>                
                    
                    <div id="destination-<?php echo $short_name; ?>">
                        <form class="tourform" method="post" action="<?php bloginfo('url'); ?>/?page_id=56">
                            <ul>
                            <li>
                            <label for="tour_type">Excursion</label>
                            <select id="tour_type" name="tour_type" class="tour_type">
                                <option value="0">Any type</option>	
                                <?php get_listing_type_price('tour_type', 'tour_type'); ?>
                            </select>
                            </li>
                            <li>
                            <label for="destination_area">Where do you want to go in <?php echo $countrytab; ?>?</label>
                            <select id="destination_area" name="destination_area" class="destination_area">
                                <option value="0">Anywhere</option>	
                                <?php get_listing_area('destination_area', 'countries_destination', $country_id); ?>
                            </select>                            
                            </li>                            
                            <li>
                            <label for="minprice_tour">Minimum Price</label>                                                        
                            <select id="minprice_tour" name="minprice_tour" class="minprice_tour">
                                <!-- do not edit the next line -->
                                <option value="0">No Min</option>
                                <!-- change the values of any of next lines. Add/delete lines. Edit ONLY the numbers. -->
                                <option value="10">10</option>
                                <option value="100">100</option>
                                <option value="200">200</option>
                                <option value="300">300</option>
                                <option value="400">400</option>
                                <option value="500">500</option>
                                <option value="600">600</option>
                                <option value="700">700</option>
                                <option value="800">800</option>
                                <option value="900">900</option>
                                <option value="1000">1,000</option>
                                <option value="1100">1,100</option>
                                <option value="1200">1,200</option>
                                <option value="1300">1,300</option>
                                <option value="1400">1,400</option>
                                <option value="1500">1,500</option>
                                <option value="2000">2,000</option>
                            </select>
                            </li>
                            <li>
                            <label for="maxprice_tour">Maximum Price</label>                                                        
                            <select id="maxprice_tour" name="maxprice_tour" class="maxprice_tour">
                                <!-- do not edit the next line -->
                                <option value="9999">No Max</option>
                                <!-- change the values of any of next lines. Add/delete lines. Edit ONLY the numbers. -->                                
                                <option value="100">100</option>
                                <option value="200">200</option>
                                <option value="300">300</option>
                                <option value="400">400</option>
                                <option value="500">500</option>
                                <option value="600">600</option>
                                <option value="700">700</option>
                                <option value="800">800</option>
                                <option value="900">900</option>
                                <option value="1000">1,000</option>
                                <option value="1100">1,100</option>
                                <option value="1200">1,200</option>
                                <option value="1300">1,300</option>
                                <option value="1400">1,400</option>
                                <option value="1500">1,500</option>
                                <option value="2000">2,000</option>
                            </select>
                            </li>
                            <li>
                            <input name="toursearch" type="submit" value="Search Tour" class="btn-search-home" />                                                        
                            <input name="tour_country" value="<?php echo $countrytab; ?>" type="hidden" />
                            </li>
                            </ul>
                        </form>
                    </div>
                    
                    <div id="hotel-<?php echo $short_name; ?>">
                        <form class="hotelform" method="post" action="<?php bloginfo('url'); ?>/?page_id=260">
                            <ul>
                            <li>
                            <label for="hotel_area">Hotel Location</label>
                            <select id="hotel_area" name="hotel_area" class="hotel_area">
                                <option value="0">Anywhere</option>	
                                <?php $countries_desination =	get_listing_area('hotel_area', 'hotel_countries', $country_id); ?>
                            </select> 
                            </li>
                            <li>
                            <label for="hotel_type">Kind of Hotel</label>
                            <select id="hotel_type" name="hotel_type" class="hotel_type">
                                <option value="0">Anywhere</option>	
                                <?php get_listing_type_price('hotel_type', 'hotel_type'); ?>
                            </select>
                            </li>                            
                            <li>
                            <label for="minprice_hotel">Minimum Price</label>                                                        
                            <select id="minprice_hotel" name="minprice_hotel" class="minprice_hotel">
                                <!-- do not edit the next line -->
                                <option value="0">No Min</option>
                                <!-- change the values of any of next lines. Add/delete lines. Edit ONLY the numbers. -->
                                <option value="10">10</option>
                                <option value="100">100</option>
                                <option value="200">200</option>
                                <option value="300">300</option>
                                <option value="400">400</option>
                                <option value="500">500</option>
                                <option value="600">600</option>
                                <option value="700">700</option>
                                <option value="800">800</option>
                                <option value="900">900</option>
                                <option value="1000">1,000</option>
                                <option value="1100">1,100</option>
                                <option value="1200">1,200</option>
                                <option value="1300">1,300</option>
                                <option value="1400">1,400</option>
                                <option value="1500">1,500</option>
                                <option value="2000">2,000</option>
                            </select>
                            </li>
                            <li>
                            <label for="maxprice_hotel">Maximum Price</label>                                                        
                            <select id="maxprice_hotel" name="maxprice_hotel" class="maxprice_hotel">
                                <!-- do not edit the next line -->
                                <option value="9999">No Max</option>
                                <!-- change the values of any of next lines. Add/delete lines. Edit ONLY the numbers. -->
                                <option value="100">100</option>
                                <option value="200">200</option>
                                <option value="300">300</option>
                                <option value="400">400</option>
                                <option value="500">500</option>
                                <option value="600">600</option>
                                <option value="700">700</option>
                                <option value="800">800</option>
                                <option value="900">900</option>
                                <option value="1000">1,000</option>
                                <option value="1100">1,100</option>
                                <option value="1200">1,200</option>
                                <option value="1300">1,300</option>
                                <option value="1400">1,400</option>
                                <option value="1500">1,500</option>
                                <option value="2000">2,000</option>
                            </select>
                            </li>
                            <li>
                            <input name="hotelsearch" type="submit" value="Search Hotel" class="btn-search-home" />                                                      
                            </li>
                            </ul>
                        </form>
                    </div>
                    
                </div>
                <!-- End Search in Cambodia -->
                
            </div> 
            <!-- End Tabs 1 -->
            <?php $tab_items++;
				} // end for each tab
			?>	
            
         </div> 
        <!-- End Destination -->
        
    </div>
    <!--End Wrap-->
</div>    
<!--End Container-->

<div id="group-tours">
    <div class="wrap">
    	<h1>Group Tours</h1>
        
        <?php
			$metakey = 'minprice_value';
			$orderby = 'name';
			$order = 'ASC';
			$tournumber = 1;
			
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
			
			
				$query = "SELECT p.* FROM $wpdb->posts p, $wpdb->postmeta p1
						WHERE p.ID = p1.post_id AND p1.meta_key ='tourcountry_value' AND p1.meta_value ='Group Tours'";
				$tc = getIDs($query);								
				$_ids = $tc;
			
			$wpq = array ('post_type' => 'tours', 'meta_key' => $metakey, 'orderby' => $orderby, 'order' => $order, 'post__in' => $_ids, 'post_status' => 'publish', 'posts_per_page' => 10);
										
			$tourlisting = new WP_Query($wpq);
			
			
			//if($tourlisting->have_posts()) : while($tourlisting->have_posts()) : $tourlisting->the_post();
		?>
        <ul>
        <?php if ($tourlisting->have_posts()) : while($tourlisting->have_posts()) : $i++; if(($i % 2) == 0) : $tourlisting->next_post(); else : $tourlisting->the_post(); ?>
        <?php	include 'includes/variables.php'; ?>	
		<?php $permalink = get_permalink($post->ID); ?>
        
		<li>
            <div class="grouptour-info">
                <a href="<?php echo $permalink.'&c=Group Tour'; ?>" title="<?php echo $permalink; ?>"><?php the_title(); ?></a>
                <span> &#8213; <?php limit_word($tourarea, 50); ?></span>
            </div>
            <div class="grouptour-price"><?php  echo format_listing_price($tourminiprice); ?></span></div>
        </li>
        <?php endif; endwhile; else: ?>
        <li class="nodata">Sorry, Group tours program will coming soon!</li>
        <?php endif; ?>
        </ul>
        
        <?php $i = 0; rewind_posts(); ?>
        
        <ul>
		<?php if ($tourlisting->have_posts()) : while($tourlisting->have_posts()) : $i++; if(($i % 2) !== 0) : $tourlisting->next_post(); else : $tourlisting->the_post(); ?>
        <?php	include 'includes/variables.php'; ?>	
		<?php $permalink = get_permalink($post->ID); ?>
        
        <li>
            <div class="grouptour-info">
                <a href="<?php echo $permalink.'&c=Group Tour'; ?>" title="<?php echo $permalink; ?>"><?php the_title(); ?></a>
                <span> &#8213; <?php limit_word($tourarea, 50); ?></span>
            </div>
            <div class="grouptour-price"><?php  echo format_listing_price($tourminiprice); ?></span></div>
        </li>
        <?php endif; endwhile; else: ?>
        <li class="nodata">Sorry, Group tours program will coming soon!</li>
        <?php endif; ?>
        </ul>
        
        <a class="more-tours" href="<?php bloginfo('url'); ?>/?page_id=2931&c=Group Tours" title="Find out more group tours package">More Group Tours</a>
        <div class="clear"></div>
    </div>        
</div>
<!-- / group-tours -->

<?php get_footer(); ?>