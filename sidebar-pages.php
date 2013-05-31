<div id="c1">	
	<?php
		$countryname = trim($_POST['tour_country']);
		if($countryname == ''){
			$country_query = $_GET['c'];
			if($country_query == ''){
				$countryname = 'Cambodia';
			}else{
				$countryname = $country_query;
			}
		}
	?>
	
	<!-- Search Sidebar -->
	<div class='grid_4'>
		<div class="box radius">
			<div class="padded">
				<h2 class="purple radius"><strong>Search</strong> in <?php echo $countryname; ?> by</h2>
				<ul class="sidebar-tab">
					<li><a class="selected" href="#tour-search">Tour Package</a></li>
					<li><a href="#hotel-search">Hotel</a></li>                    
				</ul>
	
				<?php include 'includes/searchform.php' ?>                        
					
			</div>
			<!--End Padded-->
		</div>
		<!--End Box Radius-->
	</div>
	<!--End Search Sidebar-->
	
	<!-- Top Hotel -->
    <div class='grid_4'>
        <?php
            $top_hotel = 'Top Hotel'; 
            query_posts("showposts=3&post_type=hotels&hotel_top=$countryname");				
            
            remove_filter ('the_content', 'wpautop');
        ?>            	
        <div class="box radius">
            <div class="padded">
                <h2 class="purple radius"><strong>Recommended</strong> Hotels</h2>
                
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
                    
                    $resized = timthumb(56, 80, $arr_sliderimages[0], 1);
                    $permalink = get_permalink($post->ID);
                    
                ?>
                
                <div class="top-hotel-items">
                    <a href="<?php echo $permalink.'&c='.$countryname; ?>"><img src="<?php echo $resized ?>" class="border" /></a>
                    <div class="hotel-short-info">
                        <a href="<?php echo $permalink.'&c='.$countryname; ?>"><strong><?php limit_word(get_the_title(), 25); ?></strong></a><br />
                        <span><?php limit_word($hotelarea, 28); ?></span></span>
                        <a href="#" class="<?php echo $hoteltype; ?>"><?php echo $hoteltype; ?></a>                                
                    </div>   
                    <div class="clear"></div>
                </div>
                <!--End Hotel Items-->
                
                <?php 
                endwhile; endif; wp_reset_query(); 
                ?>
                 
            </div>
            <!--End Padded-->
        </div>
        <!--End Box Radius-->
    </div>
    <!--End Top Hotel--> 
    
    <!-- 3 Top Tour -->
	<div class='grid_4'>
		<div class="box radius">
			<div class="padded">
			
				<h2 class="purple radius"><strong>Recommended</strong> Tours</h2>
				
                <?php
					$top_destination = 'Top Destination'; 
					query_posts("showposts=3&post_type=tours&tour_top=$country_name");
					
					remove_filter ('the_content', 'wpautop');
				?>
                
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
					
					$resized = timthumb(56, 80, $arr_sliderimages[0], 1);
					$permalink = get_permalink($post->ID);
					
				?>
                
                <div class="top-hotel-items">
                    <a href="<?php echo $permalink.'&c='.$countryname; ?>"><img src="<?php echo $resized ?>" class="border" /></a>
                    <div class="hotel-short-info">
                        <a href="<?php echo $permalink.'&c='.$countryname; ?>"><strong><?php limit_word(get_the_title(), 25); ?></strong></a><br />
                        <span><?php limit_word($tourarea, 28); ?></span></span><br />
                        <span>From: <?php echo $tourminiprice; ?> USD</span>                                
                    </div>   
                    <div class="clear"></div>
                </div>
                <!--End Hotel Items-->
                
                <?php 
                endwhile; endif; wp_reset_query(); 
                ?>
				
			</div>
			<!--End Padded-->
		</div>
		<!--End Box Radius-->
	</div>
	<!--End 3 Top Tour-->
    
</div>    
<!--End c1-->