<?php

/* 
Template Name: Contact Us
*/

?>

<?php get_header(); ?>

<!-- This header is use for all page, exclude homepage -->
<?php include 'includes/headers-otherpage.php' ?>

<!--Other Page-->
<div id="otherpage">
    <div class="inner-wrap">
    	
    	<!--Col 1-->
        <?php get_sidebar('pages'); ?>
        <!--End Col 1-->
        
        <!--Col 1-->
        <div id="c2">
            <div class="page-detail">
            
            <h2>Contact Us</h2>
            
            <div class="area-itmes">
            
                <div class="areaname">    
                    <h5>Phnom Penh, Cambodia - Head office</h5>                   
                    
                    <p><small>#AC04, Street 55, Borei Sopheak Mongkul, Chroy Changva, Phnom Penh, Cambodia.<br />
					Tel: +855 23 426-456, 012 608-108<br />
                    Fax: +855 23 432-242<br />
                    Email:<a href="mailto:sales@eurasietravel.com.kh">sales@eurasietravel.com.kh</a><br /></small>
                    </p>
                    
                    <p><strong>Hot lines/Live chat:</strong><br />
                    <ul>
                        <li>
                        Mr. Bonny +855 12 608 108<br />
                    <script type="text/javascript" src="http://download.skype.com/share/skypebuttons/js/skypeCheck.js"></script>
                            <a href="skype:<?php echo get_option_tree('skype_name_support', '', false); ?>?chat"><img src="http://mystatus.skype.com/smallclassic/<?php echo get_option_tree('skype_name_support', '', false); ?>" style="border: none;" width="182" height="44" alt="My status" /></a> 
                    <a href="ymsgr:sendIM?zoomindochina"><img border="0" src="http://opi.yahoo.com/online?u=zoomindochina&amp;m=g&amp;t=1"></a>
                        </li>
                    </ul>    
                    </p>
                </div>
                <!--End Area Name-->        
                
                <div class="map">
                <img src="http://maps.google.com/maps/api/staticmap?center=11.566711359848265,104.92938995361328&zoom=15&size=310x156&maptype=roadmap&markers=color:green|11.566711359848265,104.92938995361328&sensor=false" alt="Eurasie Travel's location" title="Eurasie Travel's location" /><br /><small>#AC04, Street 55, Borei Sopheak Mongkul, Chroy Changva, Phnom Penh, Cambodia.</small>
                </div>
                <!--End map area-->
                <div class="clear"></div>
                
                
                
            </div>        
            <!--End Area Items-->
            
            <div class="area-itmes">
            
                <div class="areaname">
                    <h5>Siem Reap, Cambodia - Branch office</h5>
                    
                    <p><small>No. 28, Road 06, Svay Dangkum, Siem Reap Province, Cambodia<br />
					Tel: +855 63 963-449, 012 700-930<br />
                    Fax: +855 63 9636-448<br />
                    Email:<a href="mailto:info@eurasietravel.com.kh">info@eurasietravel.com.kh</a><br /></small>
                    </p>
                    
                    <p><strong>Hot lines/Live chat:</strong><br />
                     <ul>
                         <li>   
                            Mr. Sam Ang +855 12 700 930<br />
                        <script type="text/javascript" src="http://download.skype.com/share/skypebuttons/js/skypeCheck.js"></script>
                                <a href="skype:<?php echo get_option_tree('skype_name_support', '', false); ?>?chat"><img src="http://mystatus.skype.com/smallclassic/sam.nang012" style="border: none;" width="182" height="44" alt="My status" /></a> 
                        <a href="ymsgr:sendIM?samanghim"><img border="0" src="http://opi.yahoo.com/online?u=samanghim&amp;m=g&amp;t=1"></a>
                        </li>
                        <li>
                            Ms.Sopha Neary +855 xx xxx xxx<br />
                        <script type="text/javascript" src="http://download.skype.com/share/skypebuttons/js/skypeCheck.js"></script>
                                <a href="skype:<?php echo get_option_tree('skype_name_support', '', false); ?>?chat"><img src="http://mystatus.skype.com/smallclassic/ms.neary" style="border: none;" width="182" height="44" alt="My status" /></a> 
                        <a href="ymsgr:sendIM?sopha.neary"><img border="0" src="http://opi.yahoo.com/online?u=sopha.neary&amp;m=g&amp;t=1"></a>
                        </li>
                    </ul>
                    </p>
                </div>
                <!--End Area Name-->        
                
                <div class="map">
                <img src="http://maps.google.com/maps/api/staticmap?center=11.566711359848265,104.92938995361328&zoom=15&size=310x156&maptype=roadmap&markers=color:green|11.566711359848265,104.92938995361328&sensor=false" alt="Eurasie Travel's location" title="Eurasie Travel's location" /><br /><small>No. 28, Road 06, Svay Dangkum, Siem Reap Province, Cambodia</small>
                </div>
                <!--End map area-->
                <div class="clear"></div>
                
            </div>        
            <!--End Area Items-->
            
            </div>
            <!--End Tour Detail-->        
            
        </div>
        <!--End Col 2-->
        
    </div>
    <!--End Wrap-->
</div>    
<!--End Other Page-->

<?php get_footer(); ?>