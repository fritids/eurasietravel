<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>" />
<title>
	<?php if(is_home() ) { bloginfo('name'); ?> | <?php bloginfo('description'); } ?>
	<?php if(is_single() || is_page() || is_archive() || is_tag() || is_category() ) { wp_title('',true); ?> | <?php bloginfo('name'); } ?>
    <?php if(is_404()) { ?> Ops page not found | <?php bloginfo('name'); } ?>    
</title>
    <!--<meta name="google-site-verification" content="VY5U1vWOxE8gbjRf2UeQglhSXZWprPu9_n0AFHTgAwc" />-->
    <meta http-equiv="window-target" content="_top" /> <!-- skip frames -->    
	<meta name="robots" content="index,follow" />
	<!-- <meta name="keywords" content="	Eurasie travel, Eurasie, cambodia, travel, agency, Cambodia, travel agency, Angkor, tour, travels, Angkor, journey, photo, khmer, cambodia travel, tourism, adventure cambodia, mekong discovery, cambodia travel, vietnam travel, loas travel, myanmar travel, thailand travel, discovery cambodia, trekking angkor" />
	<meta name="description" content="Cambodia, Travel agency in Cambodia. Eurasie Travel & Tours, travel agency in Cambodia Siem reap. All tours & travel in Cambodia and Angkor.Personally adapted travel in cambodia. Groups and individual tours in all Cambodia and Angkor" /> -->
    
    <?php wp_head(); ?>
    
	<!-- Main Stylesheets -->
	<link href="<?php bloginfo( 'stylesheet_url' ); ?>" media="screen" rel="stylesheet" type="text/css" />
    <?php if(is_home()) : ?>
    <link href="<?php bloginfo('template_url'); ?>/styles/home.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="<?php bloginfo('template_url'); ?>/styles/cycle.css" rel="stylesheet" type="text/css" />
    <?php else : ?>
    <link href="<?php bloginfo('template_url'); ?>/styles/otherpage.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="<?php bloginfo('template_url'); ?>/styles/ddsmoothmenu.css" rel="stylesheet" type="text/css" />	
	<?php endif ?>
	
	<!-- Favicons --> 
	<link href="<?php bloginfo('template_url'); ?>/favicon.png" rel="shortcut icon" type="image/png" />
	<link href="<?php bloginfo('template_url'); ?>/favicon.png" rel="icon" type="image/png" />        
           
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<!-- (cufn) Font Replacement -->
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/font/cufon-yui.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/font/vegur_400-vegur_700.font.js"></script>
    
    <script src="<?php bloginfo('template_url'); ?>/js/jquery-1.4.2.min.js" type="text/javascript"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/jquery.idTabs.min.js" type="text/javascript"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/jquery.easing.1.3.js" type="text/javascript"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/jquery.cycle.all.min.js" type="text/javascript"></script>

    <?php if(is_single()) : ?>
    <link href="<?php bloginfo('template_url'); ?>/styles/galleryslider.css" rel="stylesheet" type="text/css" />	
    <link href="<?php bloginfo('template_url'); ?>/styles/datepicker.css" rel="stylesheet" type="text/css" />
	<script src="<?php bloginfo('template_url'); ?>/js/galleryslider.js" type="text/javascript"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/form.js" type="text/javascript"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/datepicker.js" type="text/javascript"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/eye.js" type="text/javascript"></script>    
    <script src="<?php bloginfo('template_url'); ?>/js/utils.js" type="text/javascript"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/layout.js?ver=1.0.2" type="text/javascript"></script>
    
    <script type="text/javascript"> 
		jQuery(document).ready(function() {
			jQuery(".tour-bar-tabs, .bar-tabs").idTabs(); 
			
			$('.ad-gallery').adGallery({
				
				loader_image: '<?php bloginfo('template_url'); ?>/images/loading.gif',
				description_wrapper: $('#descriptions'),
				animation_speed: 1200
			});
			
			$('#bookingtourform').FormValidate({			
				phpFile:"<?php bloginfo('template_url'); ?>/send-booking-tour.php",
				ajax:true,
				validCheck: true
			});			

			$('#bookinghotelform').FormValidate({			
				phpFile:"<?php bloginfo('template_url'); ?>/send-booking-hotel.php",
				ajax:true,
				validCheck: true
			})
			
	});
	</script>

    
    <?php endif; ?>
    
    <?php if(!is_home()) : ?>
    <script src="<?php bloginfo('template_url'); ?>/js/ddsmoothmenu.js" type="text/javascript"></script>

    <script type="text/javascript">
	
		jQuery(document).ready(function() {

			var countrypage = '<?php echo trim($_POST['tour_country']); ?>';
			
			if(countrypage == '') {
				countrypage = '<?php echo $_GET['c']; ?>';
			}			
			
			$('#smoothmenu1>ul>li>a').each(function(){
				var pageselected = $(this).text();
				if (countrypage == pageselected){
					$(this).parent().addClass('current_page_item');
				}
			})
			
			
			// setup content boxes (Search Filters)
			if ($(".content-box").length) {
				$(".content-box .header-section").css({
					"cursor": "s-resize"
				});
				// Give the header in content-box a different cursor	
				$(".content-box .header-section").click(
				function () {
					$(this).parent().find('.section').toggle(); // Toggle the content
					$(this).parent().toggleClass("content-box-closed"); // Toggle the class "content-box-closed" on the content
				});
			}
			
			//Add active hotel area when people click to short hotel area
			$('.short-area li a').each(function(){
				if ( $(this).text() == $('h2.dark-gray span').text() ) {
					$(this).addClass('active');
				}
			});
		});	
	
    	ddsmoothmenu.init({
			mainmenuid: "smoothmenu1", //menu DIV id
			orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
			classname: 'ddsmoothmenu', //class added to menu's outer DIV
			//customtheme: ["#1c5a80", "#18374a"],
			contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
		})		
		
		ddsmoothmenu.init({
			mainmenuid: "smoothmenu2", //Menu DIV id
			orientation: 'v', //Horizontal or vertical menu: Set to "h" or "v"
			classname: 'ddsmoothmenu-v', //class added to menu's outer DIV
			//customtheme: ["#804000", "#482400"],
			contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
		})
		
		
	</script>
    <?php endif ?>
    
    <script type="text/javascript"> 
            jQuery(document).ready(function() {
                jQuery("#country-destination ul, ul.sidebar-tab").idTabs(); 
                
                jQuery('.cycle').each(function(index){
                    jQuery(this).before('<div id="nav-slide"><ul class="pi-pager nav'+index+'">').cycle({
                        fx: 'fade', // choose your transition type, ex: fade, scrollUp, shuffle, etc...
                        easing: 'easeInOutExpo',					
                        delay: 50,
                        speed: 2000,
                        next:   '.next2', 
                        prev:   '.prev2',
                        pager:  '.nav'+index,
                        // callback fn that creates a thumbnail to use as pager anchor
                        pagerAnchorBuilder: function(idx, slide) {
                            return '<li><a href="#">*</a></li>';
                        },
                        after:function onAfter(curr,next,opts) {
                            var caption = (opts.currSlide + 1) + ' of ' + opts.slideCount;
                            jQuery('.caption').html(caption);
                        }
                    });
                });	
				
				jQuery('.cycle-page').cycle({
					fx: 'fade', // choose your transition type, ex: fade, scrollUp, shuffle, etc...
					delay: 1000,
					random: 1,
					easing: 'easeInOutExpo'
				});
				
				
				// Add value form search to hidden file				
				var tourtype = 0;
				var tourarea = 0;
				var tour_minprice = 0;
				var tour_maxprice = 9999;
				
				var hoteltype = 0;
				var hotelarea = 0;
				var hotel_minprice = 0;
				var hotel_maxprice = 9999;
				
				var countryname = $("input:hidden[name='tour_country']").attr('value');
								
				var tour_search = '<?php bloginfo('url'); ?>/?page_id=56&qtourquery=t&c='+ countryname +'&qtour_type='+ tourtype +'&qdestination_area='+ tourarea +'&qminprice_tour='+ tour_minprice +'&qmaxprice_tour=' + tour_maxprice;
				
				var hotel_search = '<?php bloginfo('url'); ?>/?page_id=260&qhotelquery=h&c='+ countryname +'&qhotel_type='+ hoteltype +'&qhotel_area='+ hotelarea +'&qminprice_hotel='+ hotel_minprice +'&qmaxprice_hotel=' + hotel_maxprice;
				
				$('ul.tabs li a').each(function(){
					$(this).click(function(){
						var tab_name = $(this).text();
						countryname = tab_name;										
						tour_search = '<?php bloginfo('url'); ?>/?page_id=56&qtourquery=t&c='+ countryname +'&qtour_type='+ tourtype +'&qdestination_area='+ tourarea +'&qminprice_tour='+ tour_minprice +'&qmaxprice_tour=' + tour_maxprice;
						hotel_search = '<?php bloginfo('url'); ?>/?page_id=260&qhotelquery=h&c='+ countryname +'&qhotel_type='+ hoteltype +'&qhotel_area='+ hotelarea +'&qminprice_hotel='+ hotel_minprice +'&qmaxprice_hotel=' + hotel_maxprice;
						
						$('form.tourform').attr('action', tour_search);
						$('form.hotelform').attr('action', hotel_search);						
					});					
				});			
				
				
				$('form.tourform select').each(function(){
						$(this).change(function(){
							
							var val_selected = $(this).val();
							var name_select = $(this).attr('name');
							
							if (name_select == 'tour_type') { 
								tourtype = val_selected; 
							}
							if (name_select == 'destination_area') { 
								tourarea = val_selected; 
							}
							if (name_select == 'minprice_tour') { 
								minprice = val_selected; 
							}
							if (name_select == 'maxprice_tour') { 
								maxprice = val_selected; 
							} 
							
							tour_search = '<?php bloginfo('url'); ?>/?page_id=56&qtourquery=t&c='+ countryname +'&qtour_type='+ tourtype +'&qdestination_area='+ tourarea +'&qminprice_tour='+ tour_minprice +'&qmaxprice_tour=' + tour_maxprice;
							$('form.tourform').attr('action', tour_search);
						});						
						
					});	
					
				$('form.hotelform select').each(function(){
						$(this).change(function(){
						var val_hotel_selected = $(this).val();
						var name_hotel_select = $(this).attr('name');						
					
						if (name_hotel_select == 'hotel_type') { 
							hoteltype = val_hotel_selected; 
						}
						if (name_hotel_select == 'hotel_area') { 
							hotelarea = val_hotel_selected; 
						}
						if (name_hotel_select == 'minprice_hotel') { 
							hotel_minprice = val_hotel_selected; 
						}
						if (name_hotel_select == 'maxprice_hotel') { 
							hotel_maxprice = val_hotel_selected; 
						}
						
						hotel_search = '<?php bloginfo('url'); ?>/?page_id=260&qhotelquery=h&c='+ countryname +'&qhotel_type='+ hoteltype +'&qhotel_area='+ hotelarea +'&qminprice_hotel='+ hotel_minprice +'&qmaxprice_hotel=' + hotel_maxprice;
						$('form.hotelform').attr('action', hotel_search);
					});	
				});			
					
				$('form.tourform').attr('action', tour_search);	
				$('form.hotelform').attr('action', hotel_search);
				
				
							
                
            });
			
			
			Cufon.replace('h1, h2, h3, h4, h5, span.bottom, .eurasie-message p', {
                hover: true});
			
			// Select Language FUNCTION
            function langMenu(){
            if (document.getElementById('langDropMenu').style.display == 'none'){
                document.getElementById('langDropMenu').style.display = 'block';
                jQuery("#langTab").addClass('openLangMenu');
            }
            else{
                document.getElementById('langDropMenu').style.display = 'none';
                jQuery("#langTab").removeClass('openLangMenu');
            }
            }
		
	
	</script>
    
</head>

<body>