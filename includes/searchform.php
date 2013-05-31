<?php 
	
	$search_countries = trim($_POST['tour_country']);
	if($search_countries == ''){
		$search_countries = $_GET['c'];
	}
	
	if($search_countries == 'Cambodia') {
		$country_area = 3;
	} elseif($search_countries == 'Vietnam'){
		$country_area = 21;
	} elseif($search_countries == 'Laos'){
		$country_area = 22;
	} elseif($search_countries == 'Myanmar'){
		$country_area = 23;
	} elseif($search_countries == 'Thailand'){
		$country_area = 130;
	}

?>

<div id="tour-search">
    <form class="sidebar-search tourform" method="post" action="<?php bloginfo('url'); ?>/?page_id=56">
        <div class="grid_2">
        <label for="hotel_area"><span class="big">Excursion</span></label>
        <select id="tour_type" name="tour_type" class="short-size">
            <option value="0">Any type</option>	
            <?php get_listing_type_price('tour_type', 'tour_type'); ?>
        </select>
        </div>
                                        
        <div class="grid_2 last">       
        <label for="hotel_area"><span class="big">Destination area</span></label>    
        <select id="destination_area" name="destination_area" class="short-size">
            <option value="0">Anywhere</option>	
            <?php get_listing_area('destination_area', 'countries_destination', $country_area); ?>
        </select>

        </div>
        
        <div class="grid_2">        
        <label for="minprice_tour"><span class="big">Minimum Price</span></label>                                                        
        <select id="minprice_tour" name="minprice_tour" class="short-size">
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
        </div>
        
        <div class="grid_2 last">
        <label for="maxprice_tour"><span class="big">Maximum Price</span></label>                                                        
        <select id="maxprice_tour" name="maxprice_tour" class="short-size">
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
        </div>
        <div class="clear"></div>
        <input type="submit" class="btn-search" value="Search Tour" />
        <input name="tour_country" value="<?php echo $search_countries; ?>" type="hidden" />
    </form>
</div>
<!--End Tour Search-->   

<div id="hotel-search">
<form class="sidebar-search hotelform" method="post" action="<?php bloginfo('url'); ?>/?page_id=260">
		<div class="grid_2">
        <label for="hotel_area"><span class="big">Hotel Area</span></label>
        <select id="hotel_area" name="hotel_area" class="short-size">
        <option value="0">Anywhere</option>
        <?php $countries_desination =	get_listing_area('hotel_area', 'hotel_countries', $country_area); ?>
        </select>
        </div>
                                                
        <div class="grid_2 last">       
        <label for="hotel_type"><span class="big">Kind of hotel</span></label>    
        <select id="hotel_type" name="hotel_type" class="short-size">
            <option value="0">Anywhere</option>	
            <?php get_listing_type_price('hotel_type', 'hotel_type'); ?>
        </select>

        </div>
        
        <div class="grid_2">        
        <label for="minprice_hotel"><span class="big">Minimum Price</span></label>                                                        
        <select id="minprice_hotel" name="minprice_hotel" class="short-size">
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
        </div>
        
        <div class="grid_2 last">
        <label for="maxprice_hotel"><span class="big">Maximum Price</span></label>                                                        
        <select id="maxprice_hotel" name="maxprice_hotel" class="short-size">
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
        </div>
        <div class="clear"></div>
        <input type="submit" class="btn-search" value="Search Hotel" />
</form>
</div>
<!--End Hotel Search-->

 