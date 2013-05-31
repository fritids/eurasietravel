<h2 class="purple radius"><strong>Refine</strong> your hotel</h2>

<!-- Hotel Star -->
<div class="content-box">
    <div class="header-section">Hotel Type</div>
    <div class="section">                            	
        <ul class="full">
        <?php 
            $hoteltypes =  get_categories('taxonomy=hotel_type&hide_empty=0'); 
            foreach ($hoteltypes as $hoteltype){
        ?>
            <li><span class="type"><a href="#" title="<?php echo $hoteltype->cat_name; ?>" class="<?php echo $hoteltype->category_nicename; ?>"><?php echo $hoteltype->cat_name; ?></a></span><span class="value"><?php echo $hoteltype->category_count; ?> Hotels</span></li>
        <?php	
            }
        ?>                        
        </ul>
        <div class="clear"></div>
    </div>
</div>
<!--End Hotel Star-->

<!-- Price Range -->
<div class="content-box">
    <div class="header-section">Price range</div>
    <div class="section">                            	
        <ul class="full">
        <?php 
            $hotelpriceragnes =  get_categories('taxonomy=hotel_pricerange&hide_empty=0'); 
            foreach ($hotelpriceragnes as $pricerange){
        ?>
            <li><span class="type"><?php echo $pricerange->cat_name; ?></span><span class="value"><?php echo $pricerange->category_count; ?> Hotels</span></li>
        <?php } ?>
        </ul>
        <div class="clear"></div>
    </div>
</div>
<!--End Hotel type-->