<?php 
	
	
	//Query Taxonomy
	function get_listing_area($name, $taxonomy, $child_of) {
			
		$name	 	  = $name;
		$taxonomy     = $taxonomy;
		$orderby      = 'name'; 
		$hierarchical = 1;      // 1 for yes, 0 for no
		$child_of	  = $child_of;
		$hide_empty	  = 0;
		
		$args = array(
		  'name'		 => $name,
		  'taxonomy'     => $taxonomy,
		  'orderby'      => $orderby,
		  'hierarchical' => $hierarchical,						  
		  'child_of'	 => $child_of,
		  'hide_empty'   => $hide_empty	  
		);
		
		$categories=get_categories($args);		
		foreach ($categories as $category) {
			$option = '<option value="'.$category->cat_name.'">';
			$option .= $category->cat_name;
			$option .= '</option>';
			echo $option;
		}	
		
	}
	
	function get_listing_type_price($name, $taxonomy){
	
		$name	 	  = $name;
		$taxonomy     = $taxonomy;
		$orderby      = 'name'; 
		$hierarchical = 1;      // 1 for yes, 0 for no		
		$hide_empty	  = 0;
		
		$args = array(
		  'name'		 => $name,
		  'taxonomy'     => $taxonomy,
		  'orderby'      => $orderby,
		  'hierarchical' => $hierarchical,
		  'hide_empty'   => $hide_empty
		);
		
		$categories=get_categories($args);		
		foreach ($categories as $category) {
			$option = '<option value="'.$category->cat_name.'">';
			$option .= $category->cat_name;
			$option .= '</option>';
			echo $option;
		}
	
	}
	
	// get all of the images attached to the current post
	function get_gallery_images() {
		global $post;
	
		$photos = get_children( array('post_parent' => $post->ID, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID') );		
	
		$galleryimages = array();
	
		if ($photos) {
			foreach ($photos as $photo) {
				// get the correct image html for the selected size
				$galleryimages[] = wp_get_attachment_url($photo->ID);
			}
		}
		return $galleryimages;
	}
	
	
	function timthumb($height,$width,$img_url,$stretch) {

		$image['url'] = $img_url;
		$image_path = explode($_SERVER['SERVER_NAME'], $image['url']);
		$image_path = $_SERVER['DOCUMENT_ROOT'] . $image_path[1];
		$image_info = @getimagesize($image_path);
		
		if (is_multisite()) {
			$img_url = get_current_site(1)->path.str_replace(get_blog_option($blog_id,'fileupload_url'),get_blog_option($blog_id,'upload_path'), $img_url);
			}
	
		// If we cannot get the image locally, try for an external URL
		if (!$image_info)
			$image_info = @getimagesize($image['url']);
	
		$image['width'] = $image_info[0];
		$image['height'] = $image_info[1];
		if($img_url != "" && ($image['width'] != $width || $image['height'] != $height || !isset($image['width']))){
			$img_url = get_bloginfo('template_url')."/scripts/timthumb.php?q=90&amp;src=$img_url&amp;w=$width&amp;h=$height&amp;zc=$stretch";
		}
		
		return $img_url;
	}
	
	function format_listing_price($price){
		$price_format = '';
		if($price == '' || strtoupper($price) == 'NA' || strtoupper($price) == 'N/A') : 
			$price_format .= '<span class="not-available">Not Available</span>';
		else:
			$price_format .= '<span class="symbol">$ </span>';
			$price_format .= '<span class="price">' . $price . '</span>';
			$price_format .= '<sup class="micro"> USD</sup>';
		endif;	
		
		return $price_format;
	}
	
	
	function curPageURL() {
		 $pageURL = 'http';
		 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
		 $pageURL .= "://";
		 if ($_SERVER["SERVER_PORT"] != "80") {
		  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
		 } else {
		  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
		 }
		 return $pageURL;
	}
	
	
?>