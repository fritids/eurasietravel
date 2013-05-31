<!--Area Navigation-->
<div class="area-nav">
    <form>
        <?php 								
            $countries_destination = get_option_tree('country_destination', '', false); 								
            $countries_destination = explode("\n", $countries_destination);
            
            //get area in Cambodia
            $short_area_cambodia = get_option_tree('short_area_cambodia', '', false);
            $short_area_cambodia = explode("\n", $short_area_cambodia);
            
            //get area in Vietname
            $short_area_vietnam = get_option_tree('short_area_vietnam', '', false);
            $short_area_vietnam = explode("\n", $short_area_vietnam);
            
            //get area in Laos
            $short_area_laos = get_option_tree('short_area_laos', '', false);
            $short_area_laos = explode("\n", $short_area_laos);
            
            //get area in Myanmar
            $short_area_myanmar = get_option_tree('short_area_myanmar', '', false);
            $short_area_myanmar = explode("\n", $short_area_myanmar);
            
            switch($search_hotel_country){
                case 'Cambodia':
                $short_areas = $short_area_cambodia;
                break;
                
                case 'Vietnam':
                $short_areas = $short_area_vietnam;
                break;
                
                case 'Laos':
                $short_areas = $short_area_laos;
                break;
                
                case 'Myanmar':
                $short_areas = $short_area_myanmar;
                break;
            }
                                    
            foreach ($countries_destination as $item) {					
                if($item == $search_hotel_country){							
                    foreach ($short_areas as $area_name){
                        echo '<input name="by_area" type="radio" value="' .$area_name. '" /> ' . $area_name;
                    }
                }
            }									
        ?>                	                    
    </form>
</div>
<!--End Area Navigation-->
<div class="clear"></div>