<?php global $custom_list_date_metabox; ?>

<?php get_header(); ?>

<!-- This header is use for all page, exclude homepage -->
<?php include 'includes/headers-otherpage.php' ?>

<!--Other Page-->
<div id="otherpage">
    <div class="inner-wrap">
    
    	<!--Col 1-->
        <?php include 'includes/variables.php' ?>
        <?php 
			if ($tourcountry == 'Group Tours') :
				get_sidebar('grouptours');
			else:
				get_sidebar('toursearch');
			endif;
		?>
        <!--End Col 1-->
        
        <!--Col 1-->
        <div id="c2">
        
            <div class="tour-detail">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            		
            <?php $custom_list_date_metabox->the_meta(); ?>
                    
                	<h2><?php the_title(); ?></h2>                                       
                    <div class="hotel-addr"><strong>Destination: </strong><?php echo $tourarea; ?></div>
                    
                    <?php 
						$sliderimages = get_post_meta($post->ID, 'images_value', true); 
						if ($sliderimages) {
							$arr_sliderimages = explode("\n", $sliderimages);
						} else {
							$arr_sliderimages = get_gallery_images();
						}
					?>
                    <div class="tour-photo">
                	
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
                        
                        <ul class="tour-bar-tabs">
                            <li><a href="#highlights">Highlights</a></li>
                            <li><a href="#itenerary">Itinerary</a></li>                            
                            <li><a href="#price">Prices</a></li>
                            <li><a href="#stayinhotel">Hotel Type</a></li>
                            <li><a href="#inclusion">inclusion</a></li>                            
                            <li class="last"><a href="#booking">booking</a></li>
                        </ul>
                        
                        <div class="tour-content">                	                    
                            
                            <!--Overiew-->                    
                            <div id="highlights">
                            <div class="padded">                                
                                <?php 
									$meta = get_post_meta(get_the_ID(), $custom_highlights_metabox->get_the_id(), TRUE);
									echo $meta['tour_highlights'];
								?> 
                            </div>
                            </div>
                            <!--End highlighs-->
                            
                            <!--itenerary-->
                            <div id="itenerary">
                            <div class="padded">
                                <?php the_content(); ?>                    
                            </div>    
                            <!--End padded-->
                            </div>
                            <!--End itenerary-->
                            
                             <!--Prices-->
                            <div id="price">
                            <div class="padded">
                                <?php 
									$meta = get_post_meta(get_the_ID(), $custom_price_table_metabox->get_the_id(), TRUE);
									echo $meta['tour_price_table'];			
									//echo wpautop($custom_intenary_metabox->get_the_value('extra_content'));
									//echo apply_filters('extra_content', $thevariable);
								?>
                            </div>    
                            </div>
                            <!--End Prices-->
                            
                            <div id="stayinhotel">
                            	<div class="padded">
                            	<?php 
									$meta = get_post_meta(get_the_ID(), $custom_stay_hotel_metabox->get_the_id(), TRUE);
									echo $meta['stay_in_hotel'];
								?> 
                                </div>
                            </div>                                        
                            <!--End stayinhotel-->
                            
                            <!--Inclusion-->
                            <div id="inclusion">
                            <div class="padded">
                                <?php 
									$meta = get_post_meta(get_the_ID(), $custom_cost_includes_metabox->get_the_id(), TRUE);
									echo $meta['tour_cost_includes'];
								?>
                            </div>    
                            </div>
                            <!--End Inclusion-->
                            
                            <!--Booking-->
                            <div id="booking">
                                
                                <div class="padded">
                                
                                <div>
                                <p>Please fill information bellow for your booking.</p>
                                <form id="bookingtourform">
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
                                      <label>* Address</label>
                                        <textarea name="address" rows="2" class="is_required"></textarea>
                                    </li>
                                    <li><h3>Travel Information</h3></li>        
                                    <li>
                                        <label>Package Tours Titles:</label>
                                        <strong><?php the_title(); ?></strong>
                                    </li>
                                    
                                    <?php 
										if ($tourcountry != 'Group Tours') :	
									?>
                                    
                                    <li>
                                        <label>* Arrive Date:</label>
                                        <input class="arriveDate" id="arriveDate" value="<?php echo date("m/d/Y"); ?>" name="arriveDate" />           	
                                    </li>
                                    <li>
                                        <label>* Departure Date:</label>
                                        <input class="departureDate" id="departureDate" value="<?php echo date("m/d/Y"); ?>" name="departureDate" />
                                    </li>
                                    
                                    <?php endif; ?>
                                    
									<?php if ($tourcountry == 'Group Tours') : ?>
									
                                    <li>		
                                    <?php       
											$list_count = 1;
											if ( $custom_list_date_metabox->get_the_value( 'group_tour_date_links' ) ) : 
                                    		
											while ( $custom_list_date_metabox->have_fields_and_multi( 'group_tour_date_links' ) ) : ?>
                                            
                                            <?php 
												$departure_date = esc_html__( $custom_list_date_metabox->get_the_value( 'departure_date' ) ); 
												$end_date = esc_html__( $custom_list_date_metabox->get_the_value( 'end_date' ) ); 
												
												$departure_date = date("F j, Y", strtotime($departure_date));
												$end_date = date("F j, Y", strtotime($end_date))
											?>
                                            <label><?php if($list_count == 1) {
															echo 'Please select your date:';
														}
														else {
															echo '&nbsp;';
														} ?></label>
                                            <input class="radio" name="list_date" type="radio" value="<?php echo $departure_date . ' to ' . $end_date; ?>" /> <span class="listdate"><?php echo $departure_date . ' to ' . $end_date ?></span> <br />
                                            
                                    <?php 	
											$list_count++;
											endwhile;
										  endif;
									?>
                                    
                                    </li>
                                    
                                    <?php endif; ?>	          
                                    
                                    <li>
                                        <label>* Num. of Pax</label>
                                        <select name="numPax" size="1">
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
                                        </select>
                                    </li>
                                    <li>
                                        <label>Comments: <?php echo $country_name; ?></label>
                                        <textarea name="comments" cols="" rows="5" class="is_required"></textarea>
                                        <input type="hidden" value="<?php the_title(); ?>" name="tourname" />        
                                        <input type="hidden" value="<?php echo $tourtype; ?>" name="tourtype" />	
                                        <input type="hidden" value="<?php echo $tourcountry; ?>" name="tourcountry" />          
                                        
                                    </li>                            
                                </ul>    
                                <p align="center"><input type="submit" value="Booking Tour" class="bookingbtn" /> <input type="reset" value="Reset" class="bookingbtn" /></p>
                                </fieldset>
                            </form>
                            </div>
                            </div>
                            <!--End padded-->
                                
                            </div>
                            <!--End Booking-->
                            
                        </div>
                        <!--End Tour Content-->
	
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