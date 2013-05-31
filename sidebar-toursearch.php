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
	
	<!-- Cambodia Menu -->
	<div class='grid_4'>
		<div class="box radius">
			<div class="padded">
				<h2 class="purple radius"><strong>Explore</strong> <?php echo $countryname; ?></h2>
				<?php wp_nav_menu(array('menu' => $countryname, 'container_id' => 'smoothmenu2', 'container_class' => 'ddsmoothmenu-v')); ?>
			</div>
			<!--End Padded-->
		</div>
		<!--End Box Radius-->
	</div>
	<!--End Cambodia Menu-->
    
    <!-- 3 Top Tour -->
	<div class='grid_4'>
		<div class="box radius">
			<div class="padded">				
                <h2 class="purple radius"><strong>3 Top</strong> Hotel in <?php echo $countryname; ?></h2>
                
                	<?php
						$top_hotel = 'Top Hotel'; 
						query_posts("showposts=3&post_type=hotels&hotel_top=$countryname");				
						
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
							<span><?php limit_word($hotelarea, 28); ?></span></span>
							<a href="#" class="<?php echo $hoteltype; ?>"><?php echo $hoteltype; ?></a>                                
						</div>   
						<div class="clear"></div>
					</div>
					<!--End Hotel Items-->
					
					<?php 
							endwhile; 
						else :
					?>
                    <div class="top-hotel-items">
                    <p>Sorry, This coutnry hotels will coming soon!</p>
                    </div>
                    <?php
						endif; wp_reset_query(); 
					?>                    
                    
			</div>
			<!--End Padded-->
		</div>
		<!--End Box Radius-->        
	</div>
	<!--End 3 Top Tour-->
    
</div>    
<!--End c1-->