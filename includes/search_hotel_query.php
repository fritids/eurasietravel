<?php 
	//Query string of hotel and Hotel search
	
	$search_hotel_type = trim($_GET['qhotel_type']); 
	$search_hotel_type = str_replace(' ', '-', $search_hotel_type);
	$search_hotel_area = trim($_GET['qhotel_area']);
	$search_hotel_minprice = trim($_GET['qminprice_hotel']);	
	$search_hotel_maxprice = trim($_GET['qmaxprice_hotel']);	
	$search_hotel_country = trim($_GET['c']);
	$search_hotel_query = trim($_GET['qhotelquery']);
	
	/*$search_hotel_area = trim($_POST['hotel_area']);
	$search_hotel_type = trim($_POST['hotel_type']);
	$search_hotel_minprice = trim($_POST['hotel_maxprice']);	
	$search_hotel_maxprice = trim($_POST['hotel_maxprice']);	
	$search_hotel_query = trim($_POST['hotelquery']);*/
	
?>

<?php
$metakey = 'hotelminprice_value';
$orderby = 'name';
$order = 'desc';

if($search_hotel_type == '0' && $search_hotel_area == '0' && $search_hotel_minprice == '0' && $search_hotel_maxprice == '0' && $search_hotel_country == ''){
	$all_hotel_listings = true;
}

$_ids = array();
function getIds( $query ) {
    global $wpdb;
    
    $searchresults = $wpdb->get_results($query, ARRAY_A);
    if ( !empty ($searchresults) ) {
        foreach( $searchresults as $_post ) {
            $tmp[] = $_post['ID'];
        }
    }

    return $tmp;
}


global $wpdb;

//Check value when click search on hotel

if(!empty($search_hotel_query)) {
	if ($search_hotel_minprice !=='0' || $search_hotel_maxprice !=='0') 
	{
		$query = "SELECT p.* FROM $wpdb->posts p, $wpdb->postmeta p1
				WHERE p.ID = p1.post_id AND p1.meta_key='hotelminprice_value' AND convert(p1.meta_value, signed) BETWEEN '$search_hotel_minprice' AND '$search_hotel_maxprice'";
	}		
	
	$spm = getIds( $query );
	//print_r($spm);
	$_ids = ( !empty($spm) ? ( !empty($_ids) ? array_intersect( $_ids, $spm) : $spm ) : "" );			
}	

if($search_hotel_type !=='0')
{
	$query = "SELECT p.* FROM $wpdb->posts p, $wpdb->postmeta p1
			WHERE  p.ID = p1.post_id AND p1.meta_key ='hoteltype_value' AND p1.meta_value ='$search_hotel_type'";
			
	$tt = getIDs($query);
	//print_r($tt);
	$_ids = ( !empty($tt) ? ( !empty($_ids) ? array_intersect( $_ids, $tt) : "" ) : "" );
}

if($search_hotel_area !=='0')
{
	$query = "SELECT p.* FROM $wpdb->posts p, $wpdb->postmeta p1
			WHERE p.ID = p1.post_id AND p1.meta_key ='hotelarea_value' AND p1.meta_value LIKE '%$search_hotel_area%'";
	$ta = getIDs($query);
	//print_r($ta);
	$_ids = ( !empty($ta) ? ( !empty($_ids) ? array_intersect( $_ids, $ta) : "" ) : "" );
}

if($search_hotel_country !=='')
{
	$query = "SELECT p.* FROM $wpdb->posts p, $wpdb->postmeta p1
			WHERE p.ID = p1.post_id AND p1.meta_key ='hotelcountry_value' AND p1.meta_value ='$search_hotel_country'";
	$tc = getIDs($query);
	//print_r($tc);
	$_ids = ( !empty($tc) ? ( !empty($_ids) ? array_intersect( $_ids, $tc) : "" ) : "" );
}

//print_r($_ids);

if (!empty($_ids)) {
    $wpq = array ('post_type' => 'hotels', 'meta_key' => $metakey, 'orderby' => $orderby, 'order' => $order, 'post__in' => $_ids, 'post_status' => 'publish', 'paged' => $paged, 'posts_per_page' => 5);
	
} elseif (empty($_ids) && !$all_hotel_listings) {	
	
	// $_ids array is empty because search got no results
	// $_ids array will be empty if page is an "All Listings" page. Don't run this code if is All Listings because All Listings will show all listings. This code will display "no results found"
    $wpq = array ('post_type' =>'hotels', 'meta_key' => $metakey, 'orderby' => $orderby, 'order' => $order, 'post__in' => array('0'),'post_status' => 'publish', 'paged' => $paged, 'posts_per_page' => 5);
} else {
	
	// This is an All Listings page, so show all results
	$wpq = array ('post_type' =>'hotels', 'meta_key' => $metakey, 'orderby' => $orderby, 'order' => $order, 'post_status' => 'publish', 'paged' => $paged, 'posts_per_page' => 5);
}

?>

