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
        <?php include 'includes/variables.php' ?>
        
            <div class="hotel-detail">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            
                	<div class="name">
                        <h2><?php the_title(); ?> <a href="#" class="<?php echo $hoteltype; ?>"><?php echo $hoteltype; ?></a> </h2>                                       
                        <div class="hotel-addr"><strong>Address: </strong><?php echo $hoteladdress; ?></div>
                    </div>
                    <!--End Hotel Name-->
                    
                    <div class="wifi">
                        <img src="<?php bloginfo('template_url'); ?>/images/wifi.gif" alt="wifi" />
                        <span class="wifi-status"><?php echo $hotelwifi; ?></span>
                    </div>                
                    <!--End wifi status-->
                    <div class="clear"></div>
                   
                    <?php 
						$sliderimages = get_post_meta($post->ID, 'images_value', true); 
						if ($sliderimages) {
							$arr_sliderimages = explode("\n", $sliderimages);
						} else {
							$arr_sliderimages = get_gallery_images();
						}
					?>
                    <div class="hotel-photo">
                	
                        <div id="gallery" class="ad-gallery">
            
                                <div class="ad-image-wrapper">
                                </div><!--END ad-image-wrapper-->
                                                        
                            
                                <div class="ad-nav">
                                
                                    <div class="ad-thumbs">
                                    
                                        <ul class="ad-thumb-list">
                                        	<?php
											foreach ($arr_sliderimages as $image) { 
												$resized = timthumb(360, 610, $image, 1);
												$resized_thumb = timthumb(90, 135, $image, 1);
											?>
                                        
                                            <li>
                                                <a href="<?php echo $resized; ?>"><img src="<?php echo $resized_thumb; ?>"/></a>
                                            </li>
                                                        
                                           <? } ?>
                                        
                                        </ul><!--END ad-thumb-list-->
                                    
                                    </div><!--END ad-thumbs-->
                                
                                </div><!--END ad-nav-->
                            
                            </div><!--END gallery-->
                            
                        </div>
                        <!--End tour Photo-->
                        
                        
                        <ul class="bar-tabs">
                            <li><a href="#map">Map</a></li>
                            <li><a href="#overview">Overview</a></li>
                            <li><a href="#hotelprice">Room Rates</a></li>
                            <li><a href="#facilities">Facilities &amp; Services </a></li>                            
                            <li class="last"><a href="#booking">booking</a></li>
                        </ul>
                                	                    
                        <div class="hotel-content">    
                            
                            <!--Map-->
                            <div id="map">
                            <div class="padded">
                                <script type="text/javascript"
									src="http://maps.google.com/maps/api/js?sensor=false">
								</script>
								<script type="text/javascript">					
								  jQuery(document).ready(function ($)
									{
										var myLatlng = new google.maps.LatLng(<?php echo $hotellat; ?>,<?php echo $hotellng; ?>);
										var myOptions = {							  
										  zoom: 15,
										  center: myLatlng,
										  mapTypeId: google.maps.MapTypeId.ROADMAP
										}
										var map = new google.maps.Map(document.getElementById("gm-map"), myOptions);
										
										var marker = new google.maps.Marker({
											position: myLatlng, 
											map: map,
											animation: google.maps.Animation.DROP,
											title:"<?php the_title(); ?>"
										});
									});
								</script>
								<div id="gm-map"></div>  
                                                              
                            </div>    
                            </div>
                            <!--End Map-->
                            
                            <!--Overiew-->                    
                            <div id="overview">
                            <div class="padded">                                
                                <?php 
									$meta = get_post_meta(get_the_ID(), $custom_overview_metabox->get_the_id(), TRUE);
									echo $meta['overview_hotel'];
								?>                                 
                            </div>
                            </div>
                            <!--End highlighs-->
                            
                            <!--Prices-->
                            <div id="hotelprice">
                            <div class="padded">
                                <?php
									$meta = get_post_meta(get_the_ID(), $custom_hotel_price_metabox->get_the_id(), TRUE);
									echo $meta['price_hotel'];
								?>							                                
                            </div>    
                            </div>
                            <!--End Prices-->
                            
                            <!--itenerary-->
                            <div id="facilities">
                            <div class="padded">
                                <?php the_content(); ?> 
                            </div>    
                            <!--End padded-->
                            </div>
                            <!--End itenerary-->                            
                            
                            
                            <!--Booking-->
                            <div id="booking">
                                
                                <div class="padded">
                                
                                <div>
                                <p>Please fill information bellow for your booking.</p>
                                <form id="bookinghotelform">
                                <fieldset>    
                                <ul class="form">
                                    <li><h3>Contact Information:</h3></li>
                                    <li>
                                        <label>* Title:</label>
                                        <select name="title" size="1">
                                          <option selected="selected">--- please select ---</option>
                                          <option value="Mr.">Mr.</option>
                                          <option value="Mrs.">Mrs.</option>
                                          <option value="Ms.">Ms.</option>
                                          <option value="Mdm.">Mdm.</option>
                                          <option value="Dr.">Dr.</option>
                                        </select>
                                    </li>
                                    <li>
                                        <label>* Full Name</label>
                                        <input type="text" name="fullName" class="is_required" />
                                    </li>
                                    <li>
                                        <label>* Phone number</label>
                                        <input type="text" name="contactNumber" class="is_required" />
                                    </li>
                                    <li>
                                        <label>* Email address</label>
                                        <input class="is_required vemail" name="emailFrom" type="text" />
                                    </li>
                                    <li>
                                      <label>Address</label>
                                        <textarea name="address" rows="2" class="is_required"></textarea>
                                    </li>
                                    <li><h3>Select your date:</h3></li>        
                                    <li>
                                        <label>* Arrive Date:</label>
                                        <input class="arriveDate" id="arriveDate" value="<?php echo date("m/d/Y"); ?>" name="arriveDate" />           	
                                    </li>
                                    <li>
                                        <label>* Departure Date:</label>
                                        <input class="departureDate" id="departureDate" value="<?php echo date("m/d/Y"); ?>" name="departureDate" />
                                    </li>
                                    <li>
                                        <label>* No. of Nights</label>
                                        <select name="numNight" size="1">
                                            <option value="1">01</option>
                                            <option value="2">02</option>
                                            <option value="3">03</option>
                                            <option value="4">04</option>
                                            <option value="5">05</option>
                                            <option value="6">06</option>
                                            <option value="7">07</option>
                                            <option value="8">08</option>
                                            <option value="9">09</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                            <option value="16">16</option>
                                            <option value="17">17</option>
                                            <option value="18">18</option>
                                            <option value="19">19</option>
                                            <option value="20">20</option>
                                            <option value="21">21</option>
                                            <option value="22">22</option>
                                            <option value="23">23</option>
                                            <option value="24">24</option>
                                            <option value="25">25</option>
                                            <option value="26">26</option>
                                            <option value="27">27</option>
                                            <option value="28">28</option>
                                            <option value="29">29</option>
                                            <option value="30">30</option>
                                        </select>
                                    </li>
                                    <li><h3>Select your occupancy:</h3></li>
                                    <li><label>* No. of Rooms</label>
                                    <select name="numRoom" size="1">
                                        <option value="1">01</option>
                                        <option value="2">02</option>
                                        <option value="3">03</option>
                                        <option value="4">04</option>
                                        <option value="5">05</option>
                                        <option value="6">06</option>
                                    </select>        
                                    </li>
                                    <li>
                                        <label>* Room Type</label>
                                        <select name="roomType" size="1">
                                             <option selected="selected">--- please select ---</option>
                                             <option value="double room">Double Room</option>
                                             <option value="suite">Suite</option>
                                        </select>
                                    </li>      
                                    <li>
                                        <label>* No. of Person: #1</label>
                                        <select name="numPeople" size="1">  
                                            <option value="1">01</option>
                                            <option value="2">02</option>
                                            <option value="3">03</option>
                                            <option value="4">04</option>
                                            <option value="5">05</option>
                                            <option value="6">06</option>
                                        </select>
                                    </li>
                                    <li>
                                        <label>Comments:</label>
                                        <textarea name="comments" cols="" rows="5" class="is_required"></textarea>
                                        <input type="hidden" value="<?php the_title(); ?>" name="hotelName" />
                                        <input type="hidden" value="<?php echo $hotelarea; ?>" name="hotelArea" /> 
                                    </li>                            
                                </ul>    
                                <p align="center"><input type="submit" value="Booking Hotel" class="bookingbtn" /> <input type="reset" value="Reset" class="bookingbtn" /></p>
                                </fieldset>
                            </form>                            
                            </div>
                            </div>
                            <!--End padded-->
                                
                            </div>
                            <!--End Booking-->
                            
                        </div>
                        <!--End Hotel Content-->
	
    		<?php endwhile; else: ?>
                  <p><strong>There has been a glitch in the Matrix.</strong><br />
                  There is nothing to see here.</p>
                  <p>Please try somewhere else.</p>
            <?php endif; ?>        
            
            </div>
            <!--End Tour Detail-->        
            
        </div>
        <!--End Col 2-->
        
    </div>
    <!--End Wrap-->
</div>    
<!--End Other Page-->

<?php get_footer(); ?>