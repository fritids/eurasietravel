<div id="tab2"> 
	<?php 
        $country_name = 'Vietnam';
        $featured = 'Featured';
        
        query_posts("showposts=4&post_type=tours&tour_misc=$featured&countries_destination=$country_name");
        
        remove_filter ('the_content', 'wpautop');
    ?>
    <div class="slider">
        <div class="new-rabbon"><img src="<?php bloginfo('template_url'); ?>/images/home-new-tour.png" /></div>
        <div class="nav"><a href="#" class="prev2">Prev</a> <span class="caption"></span><a href="#" class="next2">Next</a></div>
        <ul class="cycle">
            <?php
            if (have_posts()) : while(have_posts()) : the_post();
            ?>
            
            <?php	include 'variables.php'; ?>
            
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
            <a href="<?php echo $permalink.'&c='.$country_name; ?>"><img alt="<?php echo $tourcode; ?>" src="<?php echo $resized ?>" /></a>
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
            <span><?php echo $country_name; ?>’s popular destinations</span> cover...</p>                         
        </div>                
        <div class="btn-coutnries"><a href="<?php bloginfo('url'); ?>/?page_id=50&c=<?php echo $country_name; ?>" title="Find out more in Cambodia">About <strong><?php echo $country_name; ?></strong></a></div>                
    </div>
    <!-- End Message of Cambodia -->
    
    <!-- Search in Cambodia -->
    <div class="search-home">
        <ul>
            <li><a class="selected" href="#destination-kh">Find your destination</a></li>
            <li><a href="#hotel-kh">Find your hotel</a></li>                    
        </ul>                
        
        <div id="destination-kh">
            <form method="post" action="<?php bloginfo('url'); ?>/?page_id=56">
                <ul>
                <li>
                <label for="tour_type">Excursion</label>
                <select id="tour_type" name="tour_type" class="tour_type">
                    <option value="0">Any type</option>	
                    <?php get_listing_type_price('tour_type', 'tour_type'); ?>
                </select>
                </li>
                <li>
                <label for="destination_area">Where do you want to go in Cambodia?</label>
                <select id="destination_area" name="destination_area" class="destination_area">
                    <option value="0">Anywhere</option>	
                    <?php get_listing_area('destination_area', 'countries_destination', 3); ?>
                </select>                            
                </li>                            
                <li>
                <label for="minprice_tour">Minimum Price</label>                                                        
                <select id="minprice_tour" name="minprice_tour" class="minprice_tour">
                    <!-- do not edit the next line -->
                    <option value="0">No Min</option>
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
                <input name="tourquery" id="tourquery" value="t" type="hidden" />
                <input name="tour_country" id="tour_country" value="<?php echo $country_name; ?>" type="hidden" />
                </li>
                </ul>
            </form>
        </div>
        
        <div id="hotel-kh">
            <form method="post" action="<?php bloginfo('url'); ?>/?page_id=56">
                <ul>
                <li>
                <label for="hotel_area">Hotel Location</label>
                <select id="hotel_area" name="hotel_area" class="hotel_area">
                    <option value="0">Anywhere</option>	
                    <?php $countries_desination =	get_listing_area('hotel_area', 'hotel_countries', 21); ?>
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
                <input name="hotelquery" id="hotelquery" value="h" type="hidden" />
                <input name="hotel_country" id="hotel_country" value="<?php echo $country_name; ?>" type="hidden" />
                </li>
                </ul>
            </form>
        </div>
        
    </div>
    <!-- End Search in Vietnam -->
    
</div> 
<!-- End Tabs 2 -->